<?php

namespace App\Console\Commands\Parse;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class SanPiN extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:sanpin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $sanpinData = [];
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = $this->getInfoFromSite("https://ship-c.ru/guides/substances/");

        if ($response) {
            $this->parseInfoFromData($response);
            $this->saveSanpin();
        }

        return 0;
    }

    function getInfoFromSite($url){
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        return file_get_contents($url, false, stream_context_create($arrContextOptions));
    }


    function parseInfoFromData($response){
        $crawler = new Crawler($response);

        $crawler->filter('#grid-basic tbody tr')->each(function (Crawler $node, $i) {
            $code = $node->filter('td')->eq(0)->count() ? $node->filter('td')->eq(0)->text() : '';
            $name = $node->filter('td')->eq(1)->count() ? $node->filter('td')->eq(1)->text() : '';
            if ($code && $name != '-') {
                $dataArray = [
                    'code' => $code,
                    'name' => $name,
                    // ПДК максимальная разовая
                    'pdkmr' => $node->filter('td')->eq(4)->count() ? $node->filter('td')->eq(4)->text() == '-' ? 0 : preg_replace('/,/', '.', $node->filter('td')->eq(4)->text()) : '',
                    // ПДК средне суточная
                    'pdkss' => $node->filter('td')->eq(5)->count() ? $node->filter('td')->eq(5)->text() == '-' ? 0 : preg_replace('/,/', '.', $node->filter('td')->eq(5)->text()) : '',
                    // ПДК средне годовая
                    'pdksg' => $node->filter('td')->eq(6)->count() ? $node->filter('td')->eq(6)->text() == '-' ? 0 : preg_replace('/,/', '.', $node->filter('td')->eq(6)->text()) : '',
                    'danger_class' => $node->filter('td')->eq(8)->count() ? $node->filter('td')->eq(8)->text() == '-' ? 0 : $node->filter('td')->eq(8)->text() : '',
                ];

                if (count($dataArray) > 0) {
                    $this->sanpinData[$code] = $dataArray;
                }
            }
        });
    }

    public function saveSanpin(){
        if (count($this->sanpinData) > 0) {
            $sanpinModel = new \App\Models\Admin\SanPiN();
            $sanpinModel->saveSanpin($this->sanpinData);
        }
    }
}

<?php

namespace App\Console\Commands\Parse;

use App\Models\City;
use Illuminate\Console\Command;
use SimpleXLSX;
use Symfony\Component\DomCrawler\Crawler;

class Cities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $allCitiesData = [];
    protected $allCitiesWinds = [];
    protected $cityModel;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->cityModel = new City();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = $this->getInfoFromSite("https://dokipedia.ru/document/5348621");

        if ($response) {
            $this->parseInfoFromData($response);
            $this->sortCitiesData();
            $this->saveRegions($this->allCitiesData['regions']);
            $this->saveCities($this->allCitiesData['cities']);
        }

        return Command::SUCCESS;
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

        $crawler->filter('#pid28 .data_table tr')->each(function (Crawler $node, $i) {
            if ($i > 0) {
                $dataArray = [
                    'name' => $node->filter('td')->eq(0)->count() ? $node->filter('td')->eq(0)->text() : '',

                    // Средняя температура в январе
                    // Average temperature in January
                    'average_temperature_january' => $node->filter('td')->eq(1)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(1)->text()) : '',
                    'average_temperature_february' => $node->filter('td')->eq(2)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(2)->text()) : '',
                    'average_temperature_march' => $node->filter('td')->eq(3)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(3)->text()) : '',
                    'average_temperature_april' => $node->filter('td')->eq(4)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(4)->text()) : '',
                    'average_temperature_may' => $node->filter('td')->eq(5)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(5)->text()) : '',
                    'average_temperature_june' => $node->filter('td')->eq(6)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(6)->text()) : '',
                    'average_temperature_july' => $node->filter('td')->eq(7)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(7)->text()) : '',
                    'average_temperature_august' => $node->filter('td')->eq(8)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(8)->text()) : '',
                    'average_temperature_september' => $node->filter('td')->eq(9)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(9)->text()) : '',
                    'average_temperature_october' => $node->filter('td')->eq(10)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(10)->text()) : '',
                    'average_temperature_november' => $node->filter('td')->eq(11)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(11)->text()) : '',
                    'average_temperature_december' => $node->filter('td')->eq(12)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(12)->text()) : '',
                ];

                foreach ($dataArray as $key => $value){
                    if ($value == ' ' || $value == '' || $value == ' '){
                        unset($dataArray[$key]);
                    } else if ($value == '-'){
                        $dataArray[$key] = 0;
                    }
                }

                if (count($dataArray) > 0) {
                    $this->allCitiesData[$dataArray['name']] = $dataArray;
                }
            }
        });

        $crawler->filter('#pid15 .data_table tr')->each(function (Crawler $node, $i) {
            if ($i > 4) {
                $dataArray = [
                    'name' => $node->filter('td')->eq(0)->count() ? $node->filter('td')->eq(0)->text() : '',

                    // Средняя скорость ветра м/с, за период со средней суточной температурой
                    // Average wind speed, m / s, for a period with an average daily temperature(AVD)
                    'average_wind_speed_AVD' => $node->filter('td')->eq(19)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(19)->text()) : '',
                ];

                foreach ($dataArray as $key => $value){
                    if ($value == ' ' || $value == '' || $value == ' '){
                        unset($dataArray[$key]);
                    } else if ($value == '-'){
                        $dataArray[$key] = 0;
                    }
                }

                if (count($dataArray) > 0) {
                    if (!isset($this->allCitiesData[$dataArray['name']])){
                        $this->allCitiesData[$dataArray['name']]['name'] = $dataArray['name'];
                    }

                    if (isset($dataArray['average_wind_speed_AVD'])) {
                        $this->allCitiesData[$dataArray['name']]['average_wind_speed_AVD'] = $dataArray['average_wind_speed_AVD'];
                    }
                }
            }
        });

        $crawler->filter('#pid21 .data_table tr')->each(function (Crawler $node, $i) {
            if ($i > 2) {
                $dataArray = [
                    'name' => $node->filter('td')->eq(0)->count() ? $node->filter('td')->eq(0)->text() : '',

                    // Средняя максимальная температура воздуха наиболее теплого месяца, С
                    // Average maximum air temperature of the warmest month(WM), С
                    'average_maximum_air_temperature_WM' => $node->filter('td')->eq(4)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(4)->text()) : '',
                ];

                foreach ($dataArray as $key => $value){
                    if ($value == ' ' || $value == '' || $value == ' '){
                        unset($dataArray[$key]);
                    } else if ($value == '-'){
                        $dataArray[$key] = 0;
                    }
                }

                if (count($dataArray) > 0) {
                    if (!isset($this->allCitiesData[$dataArray['name']])){
                        $this->allCitiesData[$dataArray['name']]['name'] = $dataArray['name'];
                    }

                    if (isset($dataArray['average_maximum_air_temperature_WM'])) {
                        $this->allCitiesData[$dataArray['name']]['average_maximum_air_temperature_WM'] = $dataArray['average_maximum_air_temperature_WM'];
                    }
                }
            }
        });

        // на странице данные о средней максимальной температуре хранятся в 2 таблицах
        $crawler->filter('#pid22 .data_table tr')->each(function (Crawler $node, $i) {
            $dataArray = [
                'name' => $node->filter('td')->eq(0)->count() ? $node->filter('td')->eq(0)->text() : '',

                // Средняя максимальная температура воздуха наиболее теплого месяца, С
                // Average maximum air temperature of the warmest month(WM), С
                'average_maximum_air_temperature_WM' => $node->filter('td')->eq(4)->count() ? preg_replace('/,/', '.', $node->filter('td')->eq(4)->text()) : '',
            ];

            foreach ($dataArray as $key => $value){
                if ($value == ' ' || $value == '' || $value == ' '){
                    unset($dataArray[$key]);
                } else if ($value == '-'){
                    $dataArray[$key] = 0;
                }
            }

            if (count($dataArray) > 0) {
                if (!isset($this->allCitiesData[$dataArray['name']])){
                    $this->allCitiesData[$dataArray['name']]['name'] = $dataArray['name'];
                }

                if (isset($dataArray['average_maximum_air_temperature_WM'])) {
                    $this->allCitiesData[$dataArray['name']]['average_maximum_air_temperature_WM'] = $dataArray['average_maximum_air_temperature_WM'];
                }
            }
        });

        $keyValueParams = [
            0 => 'name',
            1 => 'average_wind_speed_AVD',
            2 => 'average_maximum_air_temperature_WM',
            3 => 'average_temperature_january',
            4 => 'wind_direction_winter_N',
            5 => 'wind_direction_winter_NE',
            6 => 'wind_direction_winter_E',
            7 => 'wind_direction_winter_SE',
            8 => 'wind_direction_winter_S',
            9 => 'wind_direction_winter_SW',
            10 => 'wind_direction_winter_W',
            11 => 'wind_direction_winter_NW',
            12 => 'wind_direction_summer_N',
            13 => 'wind_direction_summer_NE',
            14 => 'wind_direction_summer_E',
            15 => 'wind_direction_summer_SE',
            16 => 'wind_direction_summer_S',
            17 => 'wind_direction_summer_SW',
            18 => 'wind_direction_summer_W',
            19 => 'wind_direction_summer_NW',
        ];

        if ($xlsx = SimpleXLSX::parse('public/excel/climat.xlsx') ) {
            $startRow = 4;

            foreach ($xlsx->rows() as $rowKey => $rowValue){
                if ($rowKey >= $startRow) {
                    $cityName = '';
                    $existName = false;
                    foreach ($rowValue as $columnKey => $columnValue) {
                        if ($columnKey == 0){
                            $existName = true;
                            $cityName = $columnValue;
                        }
                        if ($existName && $columnValue != ' ' && $columnValue != '' && $columnValue != ' ' && $columnValue != '-') {
                            $this->allCitiesData[$cityName][$keyValueParams[$columnKey]] = trim($columnValue);
                        }
                    }
                }
            }
        }
    }

    public function sortCitiesData(){ // проверяем город это или регион
        if (count($this->allCitiesData) > 0){
            $regions = [];
            $cities = [];

            $regionName = '';
            foreach ($this->allCitiesData as $key => $value){
                $item = $this->allCitiesData[$key];
                if (count($item) > 1){
                    $cities[$item['name']] = $item;
                    $cities[$item['name']]['region_name'] = $regionName;
                } else {
                    $regions[] = $item;
                    $regionName = $item['name'];
                }
            }


            $this->allCitiesData = [];
            $this->allCitiesData['regions'] = $regions;
            $this->allCitiesData['cities'] = $cities;
        }
    }

    public function saveRegions($regions){
        $this->cityModel->saveRegions($regions);
    }

    public function saveCities($cities){
        $this->cityModel->saveCities($cities);
    }
}

<?php

namespace App\Console\Commands\Cron;

use App\Models\Admin\Tariff;
use App\Models\Admin\Users;
use App\Models\Finance;
use App\Models\Module;
use Illuminate\Console\Command;

class Pay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:pay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $module;
    protected $tariff;
    protected $finance;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->module = new Module();
        $this->tariff = new Tariff();
        $this->finance = new Finance();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user =  new Users();
        $allUser = $user->getAllUserForPay();
        foreach ($allUser as $user){
            $allPrice = 0;
            $data = [];
            $userTariff = $this->tariff->getUserTarrif($user->id);
            if ($userTariff != null) {
                $allPrice = $userTariff->price;
                $allUserActiveModule = $this->module->getUserActiveModule($user->id);
                if (count($allUserActiveModule) > 0) {
                    for ($i = 0; $i < count($allUserActiveModule); $i++) {
                        $arr = [];
                        $arr['module_id'] = $allUserActiveModule[$i]->module_id;
                        $arr['user_id'] = $user->id;
                        $arr['module_price'] = $allUserActiveModule[$i]->module_price;
                        $allPrice += $allUserActiveModule[$i]->module_price;
                        $data[] = $arr;
                    }
                }
                if ($user->balance >= $userTariff->price){
                    $this->finance->useTariff($userTariff, $user->id);
                }
                if ($user->balance > $allPrice && count($data) > 0) {
                    $this->finance->useModuleTariff($data, $user->id);
                }else{
                    if (count($data) > 0) {
                        $this->finance->disconnectModule($data, $user->id);
                    }
                }
            }
        }
        return Command::SUCCESS;
    }
}

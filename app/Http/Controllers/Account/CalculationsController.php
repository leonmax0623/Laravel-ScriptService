<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Module;
use Illuminate\Http\Request;



class CalculationsController  extends Controller{

    public function index(){
        if (auth()->user()->id != null){
            $module = new Module();
            $notActiveModules = $module->getNotActiveModule(auth()->user()->id);
            $activeModules = $module->getActiveModule(auth()->user()->id);
            return view('pages.account.calculations.index',compact('notActiveModules','activeModules'));
        }else{
            return redirect('/login');
        }
    }

    public function connectModule(Request $request){
        if (auth()->user()->id != null){
            $data = [];
            $data['module_id'] = $request->module_id;
            $data['price'] = $request->price;
            $data['user_id'] = $request->user_id;
            $module = new Module();
            $add = $module->connectModule($data['module_id'],$data['user_id']);
            if ($add){
                $finance = new Finance();
                $finance->useModuleTarif($data);
            }
        }else{
            return redirect('/login');
        }
    }
    public function disconnectModule(Request $request){
        if (auth()->user()->id != null) {
            $data = [];
            $data['module_id'] = $request->module_id;
            $data['user_id'] = $request->user_id;
            $module = new Module();
            $module->disconnectModule($data['module_id'],$data['user_id']);
        }
    }

}

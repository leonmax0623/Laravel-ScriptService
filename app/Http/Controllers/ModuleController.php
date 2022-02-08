<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;


class ModuleController extends Controller{
    public $module;

    public function __construct(){
        $this->module = new Module();
    }

    public function getModuleList(){
        $allModule = $this->module->getAllModules();
        return view('admin.module.moduleList',compact('allModule'));
    }

    public function updateModule(Request $request){
        if (isset($request->module_id)){
            $data = [];
            $data['module_id'] = $request->module_id;
            $data['module_name'] = $request->module_name;
            $data['module_price'] = $request->module_price;
            $data['module_description'] = $request->module_description;
            $data['inputs'] = [];
            if ($request->repeater_val != null){
                if (count($request->repeater_val) > 0){
                    foreach ($request->repeater_val as $key){
                        if ($key['module_input'] == null){
                            $data['inputs'][] = "";
                        }else{
                            $data['inputs'][] = $key['module_input'];
                        }
                    }
                }
            }
            $data['input_1'] = isset($data['inputs'][0]) ? $data['inputs'][0] : '';
            $data['input_2'] = isset($data['inputs'][1]) ? $data['inputs'][1] : '';
            $data['input_3'] = isset($data['inputs'][2]) ? $data['inputs'][2] : '';
            $data['input_4'] = isset($data['inputs'][3]) ? $data['inputs'][3] : '';
            $data['input_5'] = isset($data['inputs'][4]) ? $data['inputs'][4] : '';
            $this->module->updateModule($data);
        }
        return redirect('/admin/moduleList');
    }

    public function modulePage(Request $request){
        if (auth()->user()->id != null){
            $moduleInfo = $this->module->getModuleInfo($request->id);
            return view('pages.account.module.index',compact('moduleInfo'));

        }
    }
}

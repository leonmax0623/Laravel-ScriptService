<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class Module
{
    public $tableName = 'modules';

    public function getAllModules(){
        return DB::table($this->tableName)->orderBy('date_update','desc')->get();
    }

    public function updateModule($data){
        $module = DB::table($this->tableName)
            ->where(['module_id'=>$data['module_id']])
            ->first();
        if ($module != null) {
            $dateUpdate = $module->date_update;
            if ($module->module_price != $data['module_price']) {
                $dateUpdate = Carbon::now();
            }
            if ($data['module_description'] == null){
                $data['module_description'] = "";
            }
            DB::table($this->tableName)
                ->where('module_id', $data['module_id'])
                ->update([
                        'module_name' => $data['module_name'],
                        'module_description' => $data['module_description'],
                        'module_price' => $data['module_price'],
                        'date_update' => $dateUpdate,
                        'input_1' => $data['input_1'],
                        'input_2' => $data['input_2'],
                        'input_3' => $data['input_3'],
                        'input_4' => $data['input_4'],
                        'input_5' => $data['input_5'],
                    ]
                );
        }
    }

    public function getNotActiveModule($userId){
        $sql = "select
	`modules`.`module_id`,
	`modules`.`module_name`,
	`modules`.`module_description`,
	`modules`.`input_1`,
	`modules`.`input_2`,
	`modules`.`input_3`,
	`modules`.`input_4`,
	`modules`.`input_5`,
	`modules`.`module_price`,
	`modules_active_users`.`module_id` as `active_module_id`,
	`modules_active_users`.`date_end`,
	modules_active_users.status 
from
	`modules`
left join `modules_active_users` on
	`modules_active_users`.`module_id` = `modules`.`module_id` and   modules_active_users.user_id = ".$userId."
where
	(`modules_active_users`.`user_id` != ".$userId."
		and `modules_active_users`.`user_id` is null)
	or (`modules_active_users`.`user_id` = ".$userId."
		and `modules_active_users`.`status` = 0)
	or (`modules_active_users`.`user_id` is null)
	or (`modules_active_users`.`user_id` = ".$userId." and `modules_active_users`.`user_id` is null)";
        $module =  DB::select($sql);
        //todo - скоріше за все, краще нативно використовувати в даному випадку sql, так як дуже багато варіантів є при видачі, їх в sql легше вказувати
//        $module = DB::table($this->tableName)->select(
//            $this->tableName . '.module_id',
//            $this->tableName . '.module_name',
//            $this->tableName . '.module_description',
//            $this->tableName . '.input_1',
//            $this->tableName . '.input_2',
//            $this->tableName . '.input_3',
//            $this->tableName . '.input_4',
//            $this->tableName . '.input_5',
//            $this->tableName . '.module_price',
//            $this->tableName.'_active_users.module_id as active_module_id',
//            $this->tableName.'_active_users.date_end'
//            )
//            ->leftJoin($this->tableName.'_active_users',$this->tableName.'_active_users.module_id','=',$this->tableName.'.module_id')
//            ->orWhere(function($query)  use ($userId) {
//                $query->where($this->tableName.'_active_users.user_id','!=',$userId)
//                    ->where($this->tableName.'_active_users.user_id','=', null);})
//            ->orWhere(function($query)  use ($userId) {
//                $query->where($this->tableName.'_active_users.user_id',$userId)
//                    ->where($this->tableName.'_active_users.status', 0);})
//            ->orWhere(function($query)  use ($userId) {
//                $query->where($this->tableName.'_active_users.user_id', null);})
//                ->get();
        return $module;
    }
    public function getActiveModule($userId){
        $module = DB::table($this->tableName)->select(
            $this->tableName . '.module_id',
            $this->tableName . '.module_name',
            $this->tableName . '.module_description',
            $this->tableName . '.input_1',
            $this->tableName . '.input_2',
            $this->tableName . '.input_3',
            $this->tableName . '.input_4',
            $this->tableName . '.input_5',
            $this->tableName . '.module_price',
            $this->tableName.'_active_users.module_id as active_module_id',
            $this->tableName.'_active_users.date_end',
            $this->tableName.'_active_users.date_create as dateConnect',
        )
            ->leftJoin($this->tableName.'_active_users',$this->tableName.'_active_users.module_id','=',$this->tableName.'.module_id')
            ->where(function($query)  use ($userId) {
                $query->where($this->tableName.'_active_users.user_id','=',$userId)
                    ->where($this->tableName.'_active_users.status','=', 1);})
            ->get();
        return $module;
    }

    public function connectModule($module_id,$user_id){
        $res =  DB::table($this->tableName.'_active_users')
            ->where(['user_id'=>$user_id,'module_id'=>$module_id])
            ->first();
        if ($res == null) {
            $currentDate = date('Y-m-d');
            $dateEnd = date("Y-m-t", strtotime($currentDate))." 23:59:59";
            DB::table($this->tableName.'_active_users')->insert([
                'module_id' => $module_id,
                'user_id' => $user_id,
                'status' => 1,
                'date_end' => $dateEnd,
                'date_create' => Carbon::now(),
                'date_update' => Carbon::now(),
            ]);
            return true;
        }else{
            DB::table($this->tableName.'_active_users')
                ->where(['user_id'=>$user_id,'module_id'=>$module_id])
                ->update([
                    'status' => 1,
                    'date_update' => Carbon::now(),
                ]);
            return false;
        }
    }

    public function disconnectModule($module_id,$user_id){
        $res =  DB::table($this->tableName.'_active_users')
            ->where(['user_id'=>$user_id,'module_id'=>$module_id])
            ->first();
        if ($res != null){
            DB::table($this->tableName.'_active_users')
                ->where(['user_id'=>$user_id,'module_id'=>$module_id])
                ->update([
                    'status' => 0,
                    'date_update' => Carbon::now(),
                ]);
        }
    }

    public function getModuleInfo($module_id){
        $module = DB::table($this->tableName)
            ->where(['module_id'=>$module_id])
            ->first();
        if ($module != null){
            return $module;
        }else{
            return [];
        }
    }

    public function getUserActiveModule($userId){
        $modules =  DB::table($this->tableName)
            ->join($this->tableName.'_active_users',$this->tableName.'_active_users.module_id','=',$this->tableName.'.module_id')
            ->where([$this->tableName.'_active_users.user_id'=>$userId,$this->tableName.'_active_users.status'=>1])->get();
        return $modules;
    }
}

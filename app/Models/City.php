<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    use HasFactory;

    protected $tableName = 'city';

    public function saveCity($data){
        if ($data) {
            if (isset($data['city_id']) && $data['city_id']){
                DB::table($this->tableName)
                    ->where('city_id', $data['city_id'])
                    ->update([
                        'city_name' => $data['name'],
                ]);

                return;
            }
            $res = DB::table($this->tableName)
                ->where('city_name', $data['name'])
                ->first();

            if ($res == null) {
                DB::table($this->tableName)->insert([
                    'city_name' => $data['name'],
                ]);
            }
        }
    }

    public function deleteCityData($cityId){
        DB::table($this->tableName)
            ->where('city_id', $cityId)
            ->delete();
    }

    public function getAllCities(){
        return DB::table($this->tableName)->select()->get(['city_id', 'name']);
    }
    public function getUsesCities(){
        return DB::table($this->tableName)->leftJoin('users', 'city.city_id', '=', 'users.city')->whereNotNull('users.city')->orderBy('city.city_name')->get();
    }

    public function getCityData($cityId){
        return DB::table($this->tableName)->select()->where('city_id', $cityId)->get()->first();
    }

    public function getAllCitiesPaginate($all = false,$userId = 0){
        $res =  DB::table($this->tableName)->orderBy('city_name')->paginate(20);
        return $res;
    }

    public function getCitiesByName($cityName){
        return DB::table($this->tableName)->where([['city_name', 'LIKE', "%{$cityName}%"]])->orderBy('city_name')->paginate(20);
    }
    // public function addNewCity($city_name, $regin_id,$userId){
    //     $res = DB::table($this->tableName)
    //         ->where(['name'=> $city_name,'region_id'=>$regin_id])
    //         ->first();
    //     if ($res == null){
    //         $id = DB::table($this->tableName)->insertGetId([
    //             'name' => $city_name,
    //             'is_region' => 0,
    //             'region_id' => $regin_id,
    //             'user_id' => $userId,
    //         ]);
    //     }else{
    //         $id = $res->city_id;
    //     }
    //     return $id;
    // }
}

<?php

namespace App\Models\Admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemperatureStratification extends Model
{
    use HasFactory;

    protected $mainTableName = 'territory_temperature_stratification';
    protected $subTableName = 'territory_temperature_stratification_region';

    public function getTTS(){

        $territories = DB::table($this->mainTableName)
            ->select()
            ->paginate(20);

        $territoriesIds = array_column($territories->items(), 'territory_id');

        $territoriesRegions = DB::table($this->subTableName)
            ->select($this->subTableName . '.territory_id', $this->subTableName . '.region_id', 'cities.name')
            ->leftJoin('cities', $this->subTableName . '.region_id', '=', 'cities.city_id')
            ->get();


        foreach ($territories->items() as $item){
            $item->regions = [];
            foreach ($territoriesRegions as $region){
                if ($region->territory_id == $item->territory_id) {
                    $item->regions[$region->region_id] = $region->name;
                }
            }
        }

        return $territories;
    }

    public function saveTTS($data, $regions, $type){
        if ($type == 'add'){
            $res = DB::table($this->mainTableName)
                ->where('name', $data['name'])
                ->first();

            if ($res != null){
                return [
                    'type' => 'error',
                    'text' => 'Территория с таким названием уже добавлена',
                ];
            }

            $id = DB::table($this->mainTableName)->insertGetId([
                'name' => $data['name'],
                'coefficient_a' => $data['coefficient_a'],
            ]);

            foreach ($regions as $region){
                DB::table($this->subTableName)->insert([
                    'territory_id' => $id,
                    'region_id' => $region,
                ]);
            }

            return [
                'type' => 'success',
                'text' => 'Территория успешно добавлена',
            ];
        } else if ($type == 'edit') {
            if (isset($data['territory_id']) && $data['territory_id']){
                DB::table($this->mainTableName)
                    ->where('territory_id', $data['territory_id'])
                    ->update([
                        'name' => $data['name'],
                        'coefficient_a' => $data['coefficient_a'],
                    ]);

                DB::table($this->subTableName)
                    ->where('territory_id', $data['territory_id'])
                    ->delete();

                foreach ($regions as $region){
                    DB::table($this->subTableName)->insert([
                        'territory_id' => $data['territory_id'],
                        'region_id' => $region,
                    ]);
                }

                return [
                    'type' => 'success',
                    'text' => 'Территория успешно отредактирована',
                ];
            } else {
                return [
                    'type' => 'error',
                    'text' => 'Не указан id территории',
                ];
            }
        }
        return [
            'type' => 'error',
            'text' => 'Произошла ошибка',
        ];
    }

    public function deleteTTS($territoryId){
        DB::table($this->mainTableName)
            ->where('territory_id', $territoryId)
            ->delete();
        DB::table($this->subTableName)
            ->where('territory_id', $territoryId)
            ->delete();
    }


    public function issetTTSName($name){
        $res = DB::table($this->mainTableName)
            ->where('name', $name)
            ->first();
        if ($res == null){
            return false;
        }else{
            return true;
        }
    }
}

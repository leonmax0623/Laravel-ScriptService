<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tariff extends Model
{
    use HasFactory;

    protected $tableName = 'tariff';

    public function getAllTariffs(){
        return DB::table($this->tableName)
            ->select('tariff_id', 'name', 'price', 'is_active')
            ->paginate(20);
    }

    public function saveTariff($data){
        if ($data){
            DB::table($this->tableName)
                ->where('tariff_id', $data['tariff_id'])
                ->update([
                    'name' => $data['name'],
                    'price' => $data['price'],
                ]);

            return [
                'type' => 'success',
                'text' => 'Тариф успешно отредактирован',
            ];
        }
        return [
            'type' => 'error',
            'text' => 'Произошла ошибка',
        ];
    }

    public function getUserTarrif($userId){
        $tariff =  DB::table('user_tariff')
            ->leftJoin('tariff','tariff.tariff_id','=',$this->tableName.'.tariff_id')
            ->orWhere(['user_tariff.user_id'=>$userId])
            ->first();
        return $tariff;
    }
}

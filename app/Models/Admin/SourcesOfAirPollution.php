<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SourcesOfAirPollution extends Model
{
    // SOAP --- Sources Of Air Pollution

    use HasFactory;

    protected $tableName = 'sources_of_air_pollution';

    public function getSOAP(){
        return DB::table($this->tableName)->orderBy('name')->paginate(20);
    }

    public function saveSOAP($data){
        if ($data) {
            $res = DB::table($this->tableName)
                ->where('name', $data['name'])
                ->first();

            if ($res != null){
                return [
                    'type' => 'error',
                    'text' => 'ИЗА с таким названием уже добавлен',
                ];
            }

            if (isset($data['source_id']) && $data['source_id'] != null) {
                DB::table($this->tableName)
                    ->where('source_id', $data['source_id'])
                    ->update([
                        'name' => $data['name'],
                        'updated_at' => Carbon::now(),
                ]);

                return [
                    'type' => 'success',
                    'text' => 'ИЗА успешно отредактирован',
                ];
            } else {
                DB::table($this->tableName)->insert([
                    'name' => $data['name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                return [
                    'type' => 'success',
                    'text' => 'ИЗА успешно добавлен',
                ];
            }
        }
    }

    public function deleteSOAP($sourceId){
        DB::table($this->tableName)
            ->where('source_id', $sourceId)
            ->delete();
    }

    public function issetSOAPName($name){
        $res = DB::table($this->tableName)
            ->where('name', $name)
            ->first();
        if ($res == null){
            return false;
        }else{
            return true;
        }
    }

    public function getAllSourcesOfAirPollution(){
        return DB::table($this->tableName)->orderBy('name')->get();
    }
}

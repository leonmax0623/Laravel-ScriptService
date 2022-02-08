<?php

namespace App\Models\Admin;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPiN extends Model
{
    use HasFactory;

    protected $tableName = 'sanpin';

    public function saveSanpin($data){
        $sql = "INSERT INTO " . $this->tableName . " (code,name,pdkmr,pdkss,pdksg,danger_class) VALUES ";

        foreach ($data as $item){
            $sql .= "(" . $item['code'] . ",'" . $item['name'] . "'," . $item['pdkmr'] . "," . $item['pdkss'] . "," . $item['pdksg'] . "," . $item['danger_class'] . "),";
        }

        $sql = substr($sql, 0, -1);

        $sql .= " ON DUPLICATE KEY UPDATE name=VALUES(name), pdkmr=VALUES(pdkmr), pdkss=VALUES(pdkss), pdksg=VALUES(pdksg), danger_class=VALUES(danger_class)";

        DB::insert($sql);
    }

    public function getAllSanpin($flag = false){
        if ($flag){
            return DB::table($this->tableName)->orderBy('code')->get();
        }else{
            return DB::table($this->tableName)->orderBy('code')->paginate(20);
        }
    }

    public function getSearchSanpin($name){
        if ($name != null){
            return DB::table($this->tableName)
                ->where('name', 'LIKE', '%' . $name . '%')
                ->paginate(20);
        }

        return [];
    }
}

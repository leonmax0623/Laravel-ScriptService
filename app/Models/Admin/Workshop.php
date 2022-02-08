<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Workshop extends Model
{
    use HasFactory;

    protected $tableName = 'workshop';

    public function getAllWorkshops(){
        return DB::table($this->tableName)
            ->leftJoin('project', 'project.project_id', '=', $this->tableName . '.project_id')
            ->leftJoin('object', 'object.object_id', '=', $this->tableName . '.object_id')
            ->leftJoin('users', 'users.id', '=', $this->tableName . '.user_id')
            ->paginate(20);
    }

    public function deleteWorkshop($workshopId){
        DB::table($this->tableName)
            ->where('workshop_id', $workshopId)
            ->delete();
    }

    public function saveWorkshop($data){
        if (isset($data['workshop_id']) && $data['workshop_id']){
            DB::table($this->tableName)
                ->where('workshop_id', $data['workshop_id'])
                ->update([
                    'name' => $data['name'],
                    'project_id' => $data['project_id'],
                    'object_id' => $data['object_id'],
                ]);

        }
    }

    public function getSearchWorkshop($email, $projectId){
        if ($email != null && $projectId != null){
            return DB::table($this->tableName)
                ->leftJoin('project', 'project.project_id', '=', $this->tableName . '.project_id')
                ->leftJoin('object', 'object.object_id', '=', $this->tableName . '.object_id')
                ->leftJoin('users', 'users.id', '=', $this->tableName . '.user_id')
                ->where([[$this->tableName . '.project_id', $projectId], ['users.email', 'LIKE', '%' . $email . '%']])
                ->paginate(20);
        } else {
            if ($email != null){
                return DB::table($this->tableName)
                    ->leftJoin('project', 'project.project_id', '=', $this->tableName . '.project_id')
                    ->leftJoin('object', 'object.object_id', '=', $this->tableName . '.object_id')
                    ->leftJoin('users', 'users.id', '=', $this->tableName . '.user_id')
                    ->where('users.email', 'LIKE', '%' . $email . '%')
                    ->paginate(20);
            }

            if ($projectId != null){
                return DB::table($this->tableName)
                    ->leftJoin('project', 'project.project_id', '=', $this->tableName . '.project_id')
                    ->leftJoin('object', 'object.object_id', '=', $this->tableName . '.object_id')
                    ->leftJoin('users', 'users.id', '=', $this->tableName . '.user_id')
                    ->where($this->tableName . '.project_id', $projectId)
                    ->paginate(20);
            }
        }

        return [];
    }

    public function addNewWorkshop($data){
        DB::table('workshop')->insert([
            'user_id' => $data['user_id'],
            'name' => $data['workshop_name'],
            'project_id' => $data['project_id'],
            'object_id' => $data['object_id'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    public function getObjectWorkshop($object_id){
        $workshop =  DB::table('workshop')->where(['object_id'=>$object_id])->orderBy('workshop_id','desc')->get();
        return $workshop;
    }
    public function createEmissionSources($data){
        DB::table('emission_sources')->insert([
            'isa_id' => $data['isa_id'],
            'emission_sources_number' => $data['iv_number'],
            'emission_sources_name' => $data['iv_name'],
            'emission_sources_gross_allocation' => $data['iv_gross_allocation'],
            'emission_sources_highlighting' => $data['iv_highlighting'],
            'emission_sources_working_days' => $data['iv_working_days'],
            'emission_sources_working_hours' => $data['iv_working_hours'],
        ]);
    }
    public function getObjectEmissionSources($object_id){
        $workshop =  DB::table('workshop')
                    ->leftJoin('emission_sources', 'emission_sources.workshop_id', '=','workshop.workshop_id')
                    ->where(['workshop.object_id'=>$object_id])->where('emission_sources.emission_sources_id', '!=', null)->get();
        return $workshop;
    }

    public function deleteEmissionSources($data){
        DB::table('emission_sources')
            ->where('emission_sources_id', $data['emission_sources_id'])
            ->delete();
    }

    public function createIsa($data){
        DB::table('isa')->insert([
            'workshop_id' => $data['workshop_id'],
            'isa_name' => $data['isa_name'],
            'isa_type' => $data['isa_type'],
            'isa_source' => $data['isa_source'],
            'isa_height' => $data['isa_height'],
            'isa_diameter' => $data['isa_diameter'],
            'isa_number' => $data['isa_number'],
            'isa_x1' => $data['isa_x1'],
            'isa_y1' => $data['isa_y1'],
            'isa_x2' => $data['isa_x2'],
            'isa_y2' => $data['isa_y2'],
            'isa_width' => $data['isa_width'],
            'isa_speed' => $data['isa_speed'],
            'isa_volume' => $data['isa_volume'],
            'isa_temperature' => $data['isa_temperature'],
            'isa_density' => $data['isa_density'],
            'isa_terrain_correction_factor' => $data['isa_terrain_correction_factor'],
        ]);
    }

    public function getObjectIsa($object_id){
        $workshop =  DB::table('workshop')
            ->join('isa', 'isa.workshop_id', '=','workshop.workshop_id')
            ->join('sources_of_air_pollution', 'sources_of_air_pollution.source_id', '=','isa.isa_type')
            ->where(['workshop.object_id'=>$object_id])->get();
        return $workshop;
    }

    public function getEmissionSources($isa_id){
        return DB::table('emission_sources')
            ->where([ 'isa_id' => $isa_id])
            ->get();
    }

    public function copyIsa($isa_id){
        $isa = DB::table('isa')
            ->where([ 'isa_id' => $isa_id])
            ->first();
        if ($isa != null){
            $name = $isa->isa_name;
            if (strpos($isa->isa_name, 'копия') !== false) {
                $res = explode("копия", $isa->isa_name);
                if (isset($res[1])){
                    $number = (int)$res[1];
                    $number = $number + 1;
                    $name = $res[0]. "копия".$number;
                }else{
                    $name = $isa->isa_name."2";
                }
            }else{
                $name = $isa->isa_name." - копия";
            }
            DB::table('isa')->insert([
                'workshop_id' => $isa->workshop_id,
                'isa_name' => $name,
                'isa_type' => $isa->isa_type,
                'isa_source' => $isa->isa_source,
                'isa_height' => $isa->isa_height,
                'isa_diameter' => $isa->isa_diameter,
                'isa_number' => $isa->isa_number,
                'isa_x1' => $isa->isa_x1,
                'isa_y1' => $isa->isa_y1,
                'isa_x2' => $isa->isa_x2,
                'isa_y2' => $isa->isa_y2,
                'isa_width' => $isa->isa_width,
                'isa_speed' => $isa->isa_speed,
                'isa_volume' => $isa->isa_volume,
                'isa_temperature' => $isa->isa_temperature,
                'isa_density' => $isa->isa_density,
                'isa_terrain_correction_factor' => $isa->isa_terrain_correction_factor,
            ]);
        }
    }

    public function deleteIsa($isa_id){
        DB::table('isa')
            ->where('isa_id', $isa_id)
            ->delete();
    }

    public function getIsaObject($isa_id){
        $isa = DB::table('isa')
            ->where([ 'isa_id' => $isa_id])
            ->first();
        return $isa;
    }

    public function updateIsa($data){
        DB::table('isa')
            ->where('isa_id', $data['isa_id'])
            ->update([
                'workshop_id' => $data['workshop_id'],
                'isa_name' => $data['isa_name'],
                'isa_type' => $data['isa_type'],
                'isa_source' => $data['isa_source'],
                'isa_height' => $data['isa_height'],
                'isa_diameter' => $data['isa_diameter'],
                'isa_number' => $data['isa_number'],
                'isa_x1' => $data['isa_x1'],
                'isa_y1' => $data['isa_y1'],
                'isa_x2' => $data['isa_x2'],
                'isa_y2' => $data['isa_y2'],
                'isa_width' => $data['isa_width'],
                'isa_speed' => $data['isa_speed'],
                'isa_volume' => $data['isa_volume'],
                'isa_temperature' => $data['isa_temperature'],
                'isa_density' => $data['isa_density'],
                'isa_terrain_correction_factor' => $data['isa_terrain_correction_factor'],
            ]);
    }

    public function updateEmissionSources($data){
        DB::table('emission_sources')
            ->where('emission_sources_id', $data['iv_id'])
            ->update([
                'isa_id' => $data['isa_id'],
                'emission_sources_number' => $data['iv_number'],
                'emission_sources_name' => $data['iv_name'],
                'emission_sources_gross_allocation' => $data['iv_gross_allocation'],
                'emission_sources_highlighting' => $data['iv_highlighting'],
                'emission_sources_working_days' => $data['iv_working_days'],
                'emission_sources_working_hours' => $data['iv_working_hours'],
            ]);
    }

    public function updateWorkshop($data){
        DB::table('workshop')
            ->where('workshop_id', $data['workshop_id'])
            ->update([
                'user_id' => $data['user_id'],
                'name' => $data['workshop_name'],
                'project_id' => $data['project_id'],
                'object_id' => $data['object_id'],
                'updated_at' => Carbon::now(),
            ]);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectObject extends Model
{
    public $tableName = "object";

    public function addNewObject($data){
        DB::table($this->tableName)->insert([
            'project_id' => $data['project_id'],
            'object_name' => $data['object_name'],
            'cadastral_number' => $data['cadastral_number'],
            'description' => $data['object_description'],
            'region_id' => $data['regin_id'],
            'city_id' => $data['city_id'],
            'object_number' => $data['object_number'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public function getAllUserObject($userId,$projectId){
        $sql = "SELECT o.*, c1.name as region, c1.city_id as objectRegionId, c2.name as city, c2.city_id  as objectCityId, p.user_id,	sum(if(w.workshop_id is not null, 1,0)) as workshop_count  from object as o
            left join cities c1 on c1.city_id = o.region_id
            left join cities c2 on c2.city_id = o.city_id
            join project as p on p.project_id = o.project_id
            left join workshop as w on w.object_id = o.object_id 
            where o.deleted = 0 and p.user_id = ".$userId. " and o.project_id =".$projectId. " 
            GROUP by o.object_id ";
        return DB::select($sql);
    }

    public function deletedObject($objectId){
        DB::table($this->tableName)
            ->where('object_id', $objectId)
            ->update(['deleted' => 1]);
    }
    public function updateObject($data){
        DB::table($this->tableName)
            ->where('object_id', $data['object_id'])
            ->update([
                'object_name' => $data['object_name'],
                'cadastral_number' => $data['cadastral_number'],
                'description' => $data['object_description'],
                'region_id' => $data['regin_id'],
                'city_id' => $data['city_id'],
                'object_number' => $data['object_number'],
                'updated_at' => Carbon::now(),
            ]);
    }

    public function getObjectInfo($objectId){
        $res = DB::table($this->tableName)
            ->where('object_id', $objectId)
            ->first();
        return $res;
    }

    public function getAllOblect(){
        return DB::table($this->tableName)
            ->leftJoin('project', 'project.project_id', '=', $this->tableName . '.project_id')
            ->leftJoin('users', 'users.id', '=', 'project.user_id')
            ->leftJoin('organization', 'organization.organization_id', '=', 'project.organization_id')
            ->where([$this->tableName . '.deleted' => 0])
            ->paginate(20);
    }

    public function getProjectObject($projectId){
        return DB::table($this->tableName)
            ->leftJoin('project', 'project.project_id', '=', $this->tableName . '.project_id')
            ->where([[$this->tableName . '.deleted', 0], [$this->tableName . '.project_id', $projectId]])
            ->get();
    }

    public function getUserId($objectId){
        $res =  DB::table($this->tableName)
            ->leftJoin('project', 'project.project_id', '=', $this->tableName . '.project_id')
            ->where($this->tableName.'.object_id',$objectId)
            ->first();
        if ($res != null){
            return $res->user_id;
        }else{
            return false;
        }
    }

    public function issetObjectName($object_name){
        $res =  DB::table($this->tableName)
            ->where('object_name',$object_name)
            ->first();
        if ($res == null){
            return false;
        }else{
            return true;
        }
    }
}


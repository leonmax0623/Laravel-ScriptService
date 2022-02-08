<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Project extends Model
{
    public $tableName = 'project';
    public function createUserProject($data){
        $res =  DB::table($this->tableName)
            ->where(['project_name'=>$data['project_name'],'user_id'=>$data['user_id']])
            ->first();
        if ($res == null){
            DB::table($this->tableName)->insert([
                'project_name' => $data['project_name'],
                'organization_id' => $data['organizationId'],
                'description' => $data['project_description'],
                'user_id' => $data['user_id'],
                'status' => $data['project_status'],
            ]);
        }else{
            DB::table($this->tableName)
                ->where(['project_name'=>$data['project_name'],'user_id'=>$data['user_id']])
                ->update([
                    'project_name' => $data['project_name'],
                    'organization_id' => $data['organizationId'],
                    'description' => $data['project_description'],
                    'user_id' => $data['user_id'],
                    'status' => $data['project_status'],
                    'updated_at' => Carbon::now(),
                ]);
        }
    }

    public function getUserProject($userId,$status = null,$organizationId = null){
        if ($status !=null && $organizationId != null){
            return DB::table($this->tableName)
                ->leftJoin('organization', 'organization.organization_id', '=', $this->tableName . '.organization_id')
                ->where([$this->tableName . '.deleted' => 0, $this->tableName . '.user_id' => $userId, 'status'=> $status,'organization.organization_id'=>$organizationId])
                ->paginate(20);
        }else if ($status != null){
            return DB::table($this->tableName)
                ->leftJoin('organization', 'organization.organization_id', '=', $this->tableName . '.organization_id')
                ->where([$this->tableName . '.deleted' => 0, $this->tableName . '.user_id' => $userId, 'status'=> $status])
                ->paginate(20);
        }else if ($organizationId != null){
            return DB::table($this->tableName)
                ->leftJoin('organization', 'organization.organization_id', '=', $this->tableName . '.organization_id')
                ->where([$this->tableName . '.deleted' => 0, $this->tableName . '.user_id' => $userId,'organization.organization_id'=>$organizationId])
                ->paginate(20);
        }else{
            return DB::table($this->tableName)
                    ->leftJoin('organization', 'organization.organization_id', '=', $this->tableName . '.organization_id')
                    ->where([$this->tableName . '.deleted' => 0, $this->tableName . '.user_id' => $userId])
                    ->paginate(20);
        }
    }

    public function getAllProject($email){
        if ($email != null) {
            return DB::table($this->tableName)->select($this->tableName . '.status as statusProject', 'users.id as user_id', 'users.email as email', $this->tableName . '.project_name', 'organization.name as organizationName', $this->tableName . '.project_id')
                ->leftJoin('organization', 'organization.organization_id', '=', $this->tableName . '.organization_id')
                ->leftJoin('users', 'users.id', '=', $this->tableName . '.user_id')
                ->where([$this->tableName . '.deleted' => 0])
                ->where('users.email','like','%'.$email.'%')
                ->paginate(20);
        }else{
            return DB::table($this->tableName)->select($this->tableName . '.status as statusProject', 'users.id as user_id', 'users.email as email', $this->tableName . '.project_name', 'organization.name as organizationName', $this->tableName . '.project_id')
                ->leftJoin('organization', 'organization.organization_id', '=', $this->tableName . '.organization_id')
                ->leftJoin('users', 'users.id', '=', $this->tableName . '.user_id')
                ->where([$this->tableName . '.deleted' => 0])
                ->paginate(20);
        }
    }

    public function deleteProject($projectId){
        DB::table($this->tableName)
            ->where('project_id', $projectId)
            ->update(['deleted' => 1]);
    }

    public function getProjectiInfo($projectId){
        return DB::table($this->tableName)
            ->leftJoin('organization', 'organization.organization_id', '=', $this->tableName . '.organization_id')
            ->where([$this->tableName . '.deleted' => 0, $this->tableName . '.project_id' => $projectId])
            ->first();
    }

    public function deletedProject($projectId){
        DB::table($this->tableName)
            ->where('project_id', $projectId)
            ->update(['deleted' => 1]);
    }

    public function updateProject($data){
        DB::table($this->tableName)
            ->where(['project_id'=>$data['project_id']])
            ->update([
                'project_name' => $data['project_name'],
                'organization_id' => $data['organization_id'],
                'description' => $data['description'],
                'status' => $data['project_status'],
                'updated_at' => Carbon::now(),
            ]);
    }

    public function issetProjectName($project_name){
        $res =  DB::table($this->tableName)
            ->where('project_name',$project_name)
            ->first();
        if ($res == null){
            return false;
        }else{
            return true;
        }
    }


}

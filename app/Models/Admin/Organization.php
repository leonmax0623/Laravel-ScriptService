<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Organization extends Model
{
    use HasFactory;

    protected $tableName = 'organization';

    public function getOrganizations(){
        return DB::table($this->tableName)
            ->leftJoin('users', 'users.id', '=', 'organization.user_id')
            ->where('organization.deleted', 0)
            ->whereNotNull('users.id')
            ->orderBy('organization.name')
            ->paginate(10, ['organization.*', 'users.email']);
    }

    public function getOrganizationsByName($organizationName){
        return DB::table($this->tableName)
            ->leftJoin('users', 'users.id', '=', 'organization.user_id')
            ->where([['organization.deleted',0], ['organization.name', 'LIKE', "%{$organizationName}%"]])
            ->whereNotNull('users.id')
            ->orderBy('organization.name')
            ->paginate(10, ['organization.*', 'users.email']);
    }

    public function getProjectsStringForOrganization($organizations){
        $organizationsIds = array_column($organizations, 'organization_id');
        $userIds = array_column($organizations, 'user_id');
        $projects = DB::table('project')
            ->where('deleted', 0)
            ->whereIn('organization_id', $organizationsIds)
            ->whereIn('user_id', $userIds)
            ->get();

        return $projects;
    }

    public function setOrganization($data){
        if (isset($data['type'])) {
            if ($data['type'] == 'add') {
                $res =  DB::table($this->tableName)
                    ->where([['inn', $data['inn']], ['user_id', $data['user_id']]])
                    ->first();

                if ($res != null){
                    return [
                        'type' => 'error',
                        'text' => 'Организация уже добавлена',
                    ];
                }

                DB::table($this->tableName)->insert([
                    'user_id' => $data['user_id'],
                    'inn' => $data['inn'],
                    'name' => $data['name'],
                    'full_name' => $data['full_name'],
                    'ogrn' => $data['ogrn'],
                    'kpp' => $data['kpp'],
                    'legal_address' => $data['legal_address'],
                    'actual_address' => $data['actual_address'],
                    'deleted' => 0,
                ]);

                return [
                    'type' => 'success',
                    'text' => 'Организация успешно добавлена',
                ];
            } else if ($data['type'] == 'edit') {
                DB::table($this->tableName)
                    ->where([['inn', $data['inn']], ['user_id', $data['user_id']]])
                    ->update([
                        'user_id' => $data['user_id'],
                        'inn' => $data['inn'],
                        'name' => $data['name'],
                        'full_name' => $data['full_name'],
                        'ogrn' => $data['ogrn'],
                        'kpp' => $data['kpp'],
                        'legal_address' => $data['legal_address'],
                        'actual_address' => $data['actual_address'],
                        'deleted' => 0,
                    ]);

                return [
                    'type' => 'success',
                    'text' => 'Организация успешно отредактирована',
                ];
            }
        }
        return [
            'type' => 'error',
            'text' => 'Произошла ошибка',
        ];
    }

    public function deleteOrganization($organizationId){
        DB::table($this->tableName)
            ->where('organization_id', $organizationId)
            ->update(['deleted' => 1]);
    }

    public function getUserOrganizations($userId,$orgName = '', $flag = false){
        if ($flag){
            return DB::table($this->tableName)->where(['deleted' => 0, 'user_id' => $userId])->orderBy('name')->get();
        }else {
            if ($orgName != null && $orgName != '') {
                return DB::table($this->tableName)->where(['deleted' => 0, 'user_id' => $userId])->where('name', 'like', '%' . $orgName . '%')->orderBy('name')->paginate(20);
            } else {
                return DB::table($this->tableName)->where(['deleted' => 0, 'user_id' => $userId])->orderBy('name')->paginate(20);
            }
        }
    }

    public function setUserOrganization($data){
        $res =  DB::table($this->tableName)
            ->where(['inn'=>$data['inn'],'user_id'=>$data['user_id']])
            ->first();

        if ($res == null){
            DB::table($this->tableName)->insert([
                'inn' => $data['inn'],
                'name' => $data['name'],
                'full_name' => $data['full_name'],
                'ogrn' => $data['ogrn'],
                'kpp' => $data['kpp'],
                'legal_address' => $data['legal_address'],
                'actual_address' => $data['actual_address'],
                'user_id' => $data['user_id'],
            ]);
        }else{
            DB::table($this->tableName)
                ->where(['inn'=>$data['inn'],'user_id'=>$data['user_id']])
                ->update([
                    'inn' => $data['inn'],
                    'name' => $data['name'],
                    'full_name' => $data['full_name'],
                    'ogrn' => $data['ogrn'],
                    'kpp' => $data['kpp'],
                    'legal_address' => $data['legal_address'],
                    'actual_address' => $data['actual_address'],
                    'user_id' => $data['user_id'],
                ]);
        }
    }

    public function getUserOrganizationsProject($userId){
        return DB::table($this->tableName)->join('project', 'project.organization_id', '=', $this->tableName . '.organization_id')->where([[$this->tableName . '.deleted', 0], ['project.user_id', $userId]])->orderBy('name')->paginate(10);
    }

    public function issetUserOrganization($userId, $inn){
        $res = DB::table($this->tableName)
            ->where([['user_id', $userId], ['inn', $inn]])
            ->first();
        if ($res == null){
            return false;
        }else{
            return true;
        }
    }
}

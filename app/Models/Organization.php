<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Organization extends Model
{
    use HasFactory;

    protected $tableName = 'organization';

    public function getUserOrganizations($userId){
        return DB::table($this->tableName)->where([['deleted', 0], ['user_id', $userId]])->orderBy('name')->paginate(10);
    }

    public function getUserOrganizationsByName($userId, $organizationName){
        return DB::table($this->tableName)->where([['deleted', 0], ['user_id', $userId], ['name', 'LIKE', "%{$organizationName}%"]])->orderBy('name')->paginate(10);
    }

    public function getProjectsStringForOrganization($organizations, $userId){
        $organizationsIds = array_column($organizations, 'organization_id');
        $userIds = array_column($organizations, 'user_id');
        $projects = DB::table('project')
            ->where([['deleted', 0], ['user_id', $userId]])
            ->whereIn('organization_id', $organizationsIds)
//            ->whereIn('user_id', $userIds)
            ->get();

        return $projects;
    }

    public function setUserOrganization($userId, $data){
        if (isset($data['type'])){
            if ($data['type'] == 'add'){
                $res =  DB::table($this->tableName)
                    ->where([['user_id', $userId], ['inn', $data['inn']]])
                    ->first();

                if ($res != null){
                    return [
                        'type' => 'error',
                        'text' => 'Организация уже добавлена',
                    ];
                }

                DB::table($this->tableName)->insert([
                    'user_id' => $userId,
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
                    ->where([['user_id', $userId], ['inn', $data['inn']]])
                    ->update([
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

    public function deleteUserOrganization($userId, $organizationId){
        DB::table($this->tableName)
            ->where([['user_id', $userId], ['organization_id', $organizationId]])
            ->delete();
//            ->update(['deleted' => 1]);
    }

    public function issetUserOrganization($userId, $inn){
        $res = DB::table($this->tableName)
            ->where([['user_id', $userId], ['inn', $inn], ['deleted', 0]])
            ->first();
        if ($res == null){
            return false;
        }else{
            return true;
        }
    }
}

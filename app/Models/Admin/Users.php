<?php

namespace App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;
class Users
{
    public function getAllUsers(){
        $res =  DB::table('users')->where('deleted',0)->paginate(20);
        return $res;
    }

    public function getAllUsersForSelect(){
        $res =  DB::table('users')->where('deleted',0)->get(['id', 'email']);
        return $res;
    }

    public function getUserInfo($userId){
        $users = DB::table('users')
            ->leftJoin('user_infos', 'user_infos.user_id', '=', 'users.id')
            ->where(['users.id'=>$userId])
            ->first();
           // var_dump($users);
      //  if(is_null($users)) $users = json_decode('{"id":'.$userId.',');
        return $users;
    }

    public function getUserRole($userId){
        $role_id = DB::table('model_has_roles')->where('model_id', $userId)->value('role_id');
        $admin_role_id = DB::table('roles')->where('name', 'admin')->value('id');
        return $role_id == $admin_role_id ? true : false;
    }

    public function getSearchUser($email,$status,$role){
        $roleName = 'user';
        if ($role == '1'){
            $roleName = 'admin';
        }
        if ($email != null && $status != null && $role != null){
            $res = User::role($roleName)->where(['deleted'=>0,'status'=>$status])->where('email','LIKE','%'.$email.'%')->paginate(20);
        }else {
            if ($email != null && $status != null) {
                $res =  DB::table('users')->where(['deleted'=>0,'status'=>$status])->where('email','LIKE','%'.$email.'%')->paginate(20);
            }else if($email != null && $role != null){
                $res = User::role($roleName)->where(['deleted' => 0])->where('email', 'LIKE', '%' . $email . '%')->paginate(20);
            }else if($status != null && $role != null){
                $res = User::role($roleName)->where(['deleted' => 0, 'status' => $status])->paginate(20);
            }else if ($status != null) {
                $res = DB::table('users')->where(['deleted' => 0, 'status' => $status])->paginate(20);
            }else if($role != null){
                $res = User::role($roleName)->where('deleted', 0)->paginate(20);
            } else if ($email != null) {
                $res = DB::table('users')->where(['deleted' => 0])->orWhere('email', 'LIKE', '%' . $email . '%')->paginate(20);
            } else {
                $res = DB::table('users')->where('deleted', 0)->paginate(20);
            }
        }
        return $res;
    }
    public function deleteUser($userId){
        DB::table('users')
            ->where('id', $userId)
            ->update(['deleted' => 1]);
    }
    public function blockUser($userId){
        DB::table('users')
            ->where('id', $userId)
            ->update(['status' => 0]);
    }
    public function activeUser($userId){
        DB::table('users')
            ->where('id', $userId)
            ->update(['status' => 1]);
    }
    public function updateUserProfile($data){
        $users = DB::table('users')
            ->leftJoin('user_infos', 'user_infos.user_id', '=', 'users.id')
            ->where(['user_id'=>$data['user_id']])
            ->first();
        if ($users != null){
            $password = '';
            if ($data['password'] == ''){
                $password  = $users->password;
            }else{
                $password =  Hash::make($data['password']);
            }
            $dateEmailCorrect = Carbon::now();
            if ($data['emailCorrect']){
                if ($users->email_verified_at != null) {
                    $dateEmailCorrect = $users->email_verified_at;
                }
            }else{
                $dateEmailCorrect = null;
            }
            DB::table('users')
                ->where('id', $data['user_id'])
                ->update([
                    'email' => $data['email'],
                    'password' => $password,
                    'email_verified_at' => $dateEmailCorrect,
                    ]
                );
            DB::table('user_infos')
                ->where('user_id', $data['user_id'])
                ->update([
                        'phone' => $data['phone']
                    ]
                );
            $role_id = DB::table('model_has_roles')->where('model_id', $data['user_id'])->value('role_id');
            $admin_role_id = DB::table('roles')->where('name', 'admin')->value('id');
            $user_role_id = DB::table('roles')->where('name', 'user')->value('id');
            $new_role = (int)$data['userRole'] ? $admin_role_id : $user_role_id;
            DB::table('model_has_roles')
              ->where('model_id', $data['user_id'])
              ->update([
                'role_id' => $new_role,
                ]
            );
            return false;
        }else{
            return true;
        }
    }

    public function createNewUsers($data){
        $users = DB::table('users')
            ->leftJoin('user_infos', 'user_infos.user_id', '=', 'users.id')
            ->where(['email'=>$data['email']])
            ->first();

        if ($users == null){
            $dateEmailCorrect = Carbon::now();
            if (!$data['emailCorrect']){
                $dateEmailCorrect = null;
            }
            $res = DB::table('users')->insertGetId([
                'city' => $data['userCity'],
                'email' => $data['email'],
                'password' => $data['password'],
                'email_verified_at' => $dateEmailCorrect,
                'created_at' => Carbon::now(),
                'first_name' => $data['first_name'] ?? '',
                'last_name' => $data['last_name'] ?? '',
            ]);
            if($res && $data['userRole'] == '1'){
                $role_id = 1;//DB::table('roles')->where('name', 'admin')->value('id');
                DB::table('model_has_roles')->insert([
                    'role_id' => $role_id,
                    'model_type' => "App\Models\User",
                    'model_id' => $res,
                ]);
            }else{
              $role_id = 2;//DB::table('roles')->where('name', 'user')->value('id');
              DB::table('model_has_roles')->insert([
                  'role_id' => $role_id,
                  'model_type' => "App\Models\User",
                  'model_id' => $res,
              ]);
            }
        }
    }

    public function getAllUserForPay(){
        $res =  DB::table('users')->where(['deleted'=>0])->get();
        return $res;
    }
}

<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;


class Company
{
    public function getUserCompany($userId){
        return  DB::table('users_company')
            ->where('user_id', $userId)
            ->first();
    }

    public static function saveCompanyRegister($userId, $companyName, $created_at){
         DB::table('users_company')->insert([
                'user_id' => $userId,
                'name' => $companyName,
                'date_create' => $created_at,
         ]);
    }
    public function saveCompany($data){
        $res =  DB::table('users_company')
            ->where('user_id', $data['user_id'])
            ->first();
        if ($res == null){
            DB::table('users_company')->insert([
            'user_id' => $data['user_id'],
            'inn' => $data['inn'],
            'name' => $data['name'],
            'full_name' => $data['full_name'],
            'ogrn' => $data['ogrn'],
            'kpp' => $data['kpp'],
            'legal_address' => $data['legal_address'],
            'actual_address' => $data['actual_address'],
             ]);
        }else{
            DB::table('users_company')
                ->where('user_id', $data['user_id'])
                ->update([
                    'inn' => $data['inn'],
                    'name' => $data['name'],
                    'full_name' => $data['full_name'],
                    'ogrn' => $data['ogrn'],
                    'kpp' => $data['kpp'],
                    'legal_address' => $data['legal_address'],
                    'actual_address' => $data['actual_address'],
                ]);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class Finance extends Model{

    public function getAllFinanceType(){
        $res =  DB::table('finance_type')
            ->get();
        return $res;
    }
    public function topUpUserAccount($data){
        $user =  DB::table('users')->where('id',$data['user_id'])->first();
        if ($user != null){
            $userBalance = $user->balance;
            $userBalance += $data['sum'];
            DB::table('finance_activity')->insert([
                'type_id' => $data['type_id'],
                'user_id' => $data['user_id'],
                'date_create' => Carbon::now(),
                'sum' => floatval($data['sum']),
                'user_balance' => floatval($userBalance),
            ]);
            DB::table('users')
                ->where(['id'=>$data['user_id']])
                ->update([
                    'balance' => floatval($userBalance),
                ]);
            return true;
        }else{
            return false;
        }
    }

    public function getFinanceActivity($user_id,$flag = false){
        if (!$flag) {
            return DB::table('finance_activity')
                ->leftJoin('modules', 'modules.module_id', '=', 'finance_activity.module_id')
                ->leftJoin('finance_type', 'finance_type.type_id', '=', 'finance_activity.type_id')
                ->leftJoin('tariff', 'tariff.tariff_id', '=', 'finance_activity.tariff_id')
                ->where('finance_activity.user_id', $user_id)
                ->orderBy('finance_activity.date_create', 'desc')
                ->paginate(20);
        }else{
            return DB::table('finance_activity')
                ->leftJoin('modules', 'modules.module_id', '=', 'finance_activity.module_id')
                ->leftJoin('finance_type', 'finance_type.type_id', '=', 'finance_activity.type_id')
                ->leftJoin('tariff', 'tariff.tariff_id', '=', 'finance_activity.tariff_id')
                ->where('finance_activity.user_id', $user_id)
                ->orderBy('finance_activity.date_create', 'desc')
                ->get();
        }
    }

    public function createNewPaymentInvoice($userId, $data){
        if ($userId){
            $paymentId = DB::table('payment_invoice')->insertGetId([
                'user_id' => $userId,
                'amount' => $data['amount'],
                'status' => 0,
                'created_at' => $data['date'],
                'updated_at' => $data['date'],
            ]);

            return $paymentId;
        }else{
            return false;
        }
    }

    public function getAllPaymentInvoices(){
        return DB::table('payment_invoice')
            ->leftJoin('users_company', 'users_company.user_id', '=', 'payment_invoice.user_id')
            ->orderBy('payment_invoice.payment_id', 'DESC')
            ->paginate(20);
    }

    public function getPaymentInvoicesWithFilter($data){
        $searchFilter = [];

        if (isset($data['company_name'])){
            $searchFilter[] = ['users_company.name', 'LIKE', '%' . $data['company_name'] . '%'];
        }

        if (isset($data['status'])){
            $searchFilter[] = ['payment_invoice.status', $data['status']];
        }

        return DB::table('payment_invoice')
            ->leftJoin('users_company', 'users_company.user_id', '=', 'payment_invoice.user_id')
            ->where($searchFilter)
            ->orderBy('payment_invoice.payment_id', 'DESC')
            ->paginate(20);
    }

    public function deletePayment($paymentId){
        DB::table('payment_invoice')
            ->where('payment_id', $paymentId)
            ->delete();
    }

    public function confirmPayment($paymentId){
        $payment = DB::table('payment_invoice')
            ->where('payment_id', $paymentId)
            ->first();

        if ($payment->user_id != null && $payment->user_id > 0) {
            $user = DB::table('users')
                ->where([['id', $payment->user_id], ['status', 1], ['deleted', 0]])
                ->first();

            if ($user != null) {
                $balance = $user->balance + $payment->amount;
                DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        'balance' => $balance,
                    ]);

                DB::table('finance_activity')
                    ->insert([
                        'type_id' => 3,
                        'user_id' => $user->id,
                        'date_create' => Carbon::now(),
                        'sum' => $payment->amount,
                        'user_balance' => $balance,
                    ]);

                DB::table('payment_invoice')
                    ->where('payment_id', $paymentId)
                    ->update([
                        'status' => 1,
                    ]);

                return true;
            }
        }

        return false;
    }

    public function getWaitingPaymentInvoicesCount(){
        return DB::table('payment_invoice')
            ->where('status', 0)
            ->count();
    }
    public function useModuleTarif($data){
        $user =  DB::table('users')->where('id',$data['user_id'])->first();
        if ($user != null){
            $userBalance = $user->balance;
            $userBalance += floor($data['price']+1);
            DB::table('finance_activity')->insert([
                'type_id' => 0,
                'user_id' => $data['user_id'],
                'date_create' => Carbon::now(),
                'sum' => floor($data['price']+1),
                'user_balance' => floatval($userBalance),
                'module_id' => $data['module_id'],
            ]);
            DB::table('users')
                ->where(['id'=>$data['user_id']])
                ->update([
                    'balance' => floatval($userBalance),
                ]);
        }
    }

    public function useTariff($tariff,$user_id){
        $user =  DB::table('users')->where('id',$user_id)->first();
        if ($user != null){
            $userBalance = $user->balance;
            $discount = $user->discount;
            if ($discount > 0){
                $tariff->price = $tariff->price - ($tariff->price / (100 / $discount));
            }
            $userBalance -= $tariff->price;
            if ($tariff->price > 0) {
                DB::table('finance_activity')->insert([
                    'type_id' => 0,
                    'user_id' => $user_id,
                    'date_create' => Carbon::now(),
                    'sum' => -$tariff->price,
                    'user_balance' => floatval($userBalance),
                    'tariff_id' => $tariff->tariff_id,
                ]);
                DB::table('users')
                    ->where(['id' => $user_id])
                    ->update([
                        'balance' => floatval($userBalance),
                    ]);
            }
            $currentDate = date('Y-m-d');
            $dateEnd = date("Y-m-t", strtotime($currentDate))." 23:59:59";
            DB::table('user_tariff')
                ->where(['user_id'=>$user_id])
                ->update([
                    'date_end' => $dateEnd,
                ]);
        }
    }

    public function useModuleTariff($data,$user_id){
        $user =  DB::table('users')->where('id',$user_id)->first();
        if ($user != null){
            $userBalance = $user->balance;
            $insertArr = [];
            $currentDate = date('Y-m-d');
            $dateEnd = date("Y-m-t", strtotime($currentDate))." 23:59:59";
            foreach ($data as $item) {
                $discount = $user->discount;
                if ($discount > 0){
                    $item['module_price'] = $item['module_price'] - ($item['module_price'] / (100 / $discount));
                }
                $userBalance -= $item['module_price'];
                $arr = [];
                $arr['type_id'] = 0;
                $arr['user_id'] = $user_id;
                $arr['date_create'] = Carbon::now();
                $arr['module_id'] = $item['module_id'];
                $arr['sum'] = -$item['module_price'];
                $arr['user_balance'] = $userBalance;
                $insertArr[] = $arr;

                DB::table('modules_active_users')
                    ->where(['user_id'=>$user_id,'module_id'=>$item['module_id']])
                    ->update([
                        'date_update' => Carbon::now(),
                        'date_end' => $dateEnd,
                    ]);
            }
            DB::table('finance_activity')->insert($insertArr);
            DB::table('users')
                ->where(['id'=>$user_id])
                ->update([
                    'balance' => floatval($userBalance),
                ]);
        }
    }

    public function getUserTariff($user_id){
        $tariff =  DB::table('tariff')
            ->leftJoin('user_tariff','user_tariff.tariff_id','=','tariff.tariff_id')
        ->where('user_tariff.user_id',$user_id)->first();
        if ($tariff == null){
            return 0;
        }else{
            return $tariff->price;
        }
    }

    public function disconnectModule($data,$user_id){
        foreach ($data as $item) {
            DB::table('modules_active_users')
                ->where(['user_id' => $user_id, 'module_id' => $item['module_id']])
                ->update([
                    'date_update' => Carbon::now(),
                    'status' => 0,
                ]);
        }
    }
}

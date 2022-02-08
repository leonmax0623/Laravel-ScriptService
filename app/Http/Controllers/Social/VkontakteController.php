<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;

class VkontakteController extends Controller
{
    public function loginWithVkontakte(){
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackFromVkontakte(){
        try {
            $user = Socialite::driver('vkontakte')->user();

            if ($user->getEmail() == null){
                return redirect('/login');
            }

            $password = substr(md5(uniqid(rand(), true)),0,8);
            $hashPass = Hash::make($password);

            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){
                $saveUser = User::create([
                    'vkontakte_id' => $user->getId(),
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'email' => $user->getEmail(),
                    'password' => $hashPass,
                    'csrf_token' => csrf_token(),
                ]);

                $userInfos = new UserInfo();
                $userInfos->createUserInfo($saveUser->id, '');
                Auth::login($saveUser);

                $data = [
                    'email'=> $user->getEmail(),
                    'real_pass'=> $password,
                ];
                Mail::send('emails.register', compact('data'), function($message) use ($data)
                {
                    $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                    $message->to($data['email'])->subject('Благодарим за регистрацию! Ваш пароль в этом письме');
                });

            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'vkontakte_id' => $user->getId(),
                    'csrf_token' => csrf_token(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
                Auth::login($saveUser);
            }

            return redirect('/');

        } catch (\Throwable $th){
            var_dump($th->getMessage());
//            return redirect('/login');
        }
    }
}

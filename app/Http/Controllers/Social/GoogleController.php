<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use function csrf_token;
use function env;
use function redirect;

class GoogleController extends Controller
{
    public function loginWithGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(){
        try {
            $user = Socialite::driver('google')->user();

            if ($user->getEmail() == null){
                return redirect('/login');
            }

            $password = substr(md5(uniqid(rand(), true)),0,8);
            $hashPass = Hash::make($password);

            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){
                $saveUser = User::create([
                    'google_id' => $user->getId(),
                    'first_name' => $user['given_name'],
                    'last_name' => $user['family_name'],
                    'email' => $user->getEmail(),
                    'email_verified_at' => ($user['email_verified'] ? date('Y-m-d H:i:s') : ''),
                    'password' => $hashPass,
                    'csrf_token' => csrf_token(),
                ]);
                $userInfos = new UserInfo();
                $userInfos->createUserInfo($saveUser->id, '');
                Auth::login($saveUser);

                $data = [
                    'email'=> $user->email,
                    'real_pass'=> $password,
                ];
                Mail::send('emails.register', compact('data'), function($message) use ($data)
                {
                    $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
                    $message->to($data['email'])->subject('Благодарим за регистрацию! Ваш пароль в этом письме');
                });

            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                    'csrf_token' => csrf_token(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
                Auth::login($saveUser);
            }

            return redirect('/');

        } catch (\Throwable $th){
            return redirect('/login');
        }
    }
}

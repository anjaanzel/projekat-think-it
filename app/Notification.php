<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Notification extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('read_at');
    }


    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

}

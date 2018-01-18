<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPUnit\Framework\MockObject\Matcher\Parameters;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
       'role_id', 'photo_id', 'is_active', 'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function isAdmin()
    {
        if($this->role->name == 'Administrator' && $this->is_active == 1)
        {
            return true;
        }
        return false;
    }

    public function isAuthor()
    {
        if($this->role->name == 'Author' || $this->role->name == 'Administrator' && $this->is_active == 1)
        {
            return true;
        }
        return false;
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}

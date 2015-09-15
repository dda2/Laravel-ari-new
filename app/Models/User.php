<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'user';

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'filename',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getNameOrUsername()
    {
        return $this->username ?: $this->username;
    } 
}
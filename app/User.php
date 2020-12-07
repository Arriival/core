<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'person_id', 'expireDate', 'status', 'block', 'unblock_time', 'wrong_trying'
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
        'username_verified_at' => 'datetime',
    ];

    public function person()
    {
        return $this->belongsTo('App\BasePerson');
    }

    public function note()
    {
        return $this->hasMany('App\Note');
    }

    public function subject()
    {
        return $this->hasMany('App\Subject');
    }

    public function topic()
    {
        return $this->hasMany('App\Topic');
    }
}

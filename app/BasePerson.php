<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasePerson extends Model
{

    protected $fillable = ['firstName', 'lastName', 'code', 'gender', 'image', 'email', 'phoneNumber', 'isActive'];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstName} {$this->lastName}";
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasePerson extends Model
{

//    private $isActive;
    protected $fillable = ['firstName', 'lastName', 'code', 'gender', 'image', 'email', 'phoneNumber'];

    public function user()
    {
        return $this->hasOne('App\User');
    }


}

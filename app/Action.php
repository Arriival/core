<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    private $title;
    private $icon;
    private $code;
    private $route;

    public function actions()
    {
        return $this->hasMany('App/Action');
    }
}

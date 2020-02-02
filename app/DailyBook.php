<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyBook extends Model
{
    protected $fillable = ['code', 'document_number', 'date', 'description', 'topic_id','user_id','amount'];
}

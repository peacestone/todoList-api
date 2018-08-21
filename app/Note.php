<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Note extends Model
{
    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    public function getCreatedTimeAgoAttribute() 
    {
       return $this->created_at->diffForHumans();
    }

    // public function notification()
    // {
    //     return $this->morphOne('App\Notification', 'notificationable');
    // }

    protected $fillable = ['content', "img_url"];

    protected $appends = ['created_time_ago'];


}

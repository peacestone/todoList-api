<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function notes()
    {
        return $this->hasMany('App\Note')->latest()->limit(10);
    }

    // public function notification()
    // {
    //     return $this->morphOne('App\Notification', 'notificationable');
    // }

    protected $fillable = ['content', 'dueDate', 'email'];


}

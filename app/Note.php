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

    protected $fillable = ['content'];

}

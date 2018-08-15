<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function notes()
    {
        return $this->hasMany('app/note');
    }

    protected $fillable = ['content', 'dueDate', 'email'];

}

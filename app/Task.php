<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function notes()
    {
        return $this->hasMany('App\Note')->limit(10);
    }

    protected $fillable = ['content', 'dueDate', 'email'];

    public function viewableNotes(){

        // $offset = $pageNumber * 10;
        // echo $offset;
        // return $this->hasMany('App\Note')->offset(2)->limit(10);
        // return Note::join('tasks', 'notes.task_id', '=', 'tasks.id' )->offset(10)->orderBy('id')

        // return Note::where('task_id', '=', $this->id);

    }
}

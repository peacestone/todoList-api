<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\TaskAdded;

class tasksController extends Controller
{
    public function create(Request $request){
        $content = $request->input('content');
        $task = new Task([
            'content' => $request->input('content'),
            'dueDate' => $request->input('dueDate'),
            'email' => $request->input('email')
        ]);

        if ($task->save()) {
            echo 'saved';
             Mail::to($task->email)->send(new TaskAdded($task));

            return response()->json($task);
        }
        else {
            return response()->json([
                'error' => 'could not persist data to database!'
            ]);
        }

    }

    public function index(){
        return response()->json(Task::all());
    }

    public function show($id){
        return response()->json(Task::find($id));
    }

}
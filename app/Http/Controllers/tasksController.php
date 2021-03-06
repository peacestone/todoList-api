<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\TaskAdded;
// use Illuminate\Support\Facades\Request;
// use Request;

class tasksController extends Controller
{
    public function create(Request $request){

       $request->validate([
            'content' => 'required',
        ]);

        $content = $request->input('content');

        $task = new Task([
            'content' => $request->input('content'),
            'dueDate' => $request->input('dueDate'),
            'email' => $request->input('email')
        ]);


        if ($task->save() ) {
            Mail::to($task->email)->send(new TaskAdded($task));
            return response($task->toJson());
        }
        else {
            return response()->json([
                'error' => 'could not persist data to database!'
            ]);
        }

    }

    public function index(){

        // return response()->json(Task::with('notes')->get());
         return response()->json(Task::all());

    }

    public function show(Request $request, $id){
        $task = Task::find($id);

        if($request->wantsJson()) 
        {
            return response()->json($task);
        }
        return view('task', ['task' => $task , 'notes' => $task->notes] );
        
        

    }

}
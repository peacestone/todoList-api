<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Note;

class notesController extends Controller
{
    public function index(Request $request, $id){

        $task = Task::find($id);
        $page = $request->input('page');
        //TODO implment pagination
        return response()->json($task->notes);

    }

    public function create(Request $request, $id){
        echo $id;
        $task = Task::find($id);
        $note = new Note([
            'content' => $request->input('content')
        ]);
        if ($task->notes()->save($note)){
            return response()->json($note);
        }
        else {
            return response()->json([
                'error' => 'could not persist note to databse!'
            ]);
        }
    }
}

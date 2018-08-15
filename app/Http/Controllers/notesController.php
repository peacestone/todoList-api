<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Task;
use App\Note;

class notesController extends Controller
{
    public function index(Request $request, $taskId){

        $notes = Note::where( 'notes.task_id', $taskId )->paginate(10);
        return response()->json($notes);

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


// >>> $test = DB::table('notes')->orderBy('id', 'desc')->limit(10)->get();
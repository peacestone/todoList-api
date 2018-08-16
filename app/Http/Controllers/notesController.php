<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Task;
use App\Note;
use App\Mail\NoteAdded;

class notesController extends Controller
{
    public function index(Request $request, $taskId){

        $notes = Note::where( 'notes.task_id', $taskId )->paginate(10);
        return response()->json($notes);

    }

    public function create(Request $request, $id){
        $task = Task::find($id);
        $note = new Note([
            'content' => $request->input('content')
        ]);
        if ($task->notes()->save($note)){
            
            Mail::to($task->email)->send(new NoteAdded($note, $task));
            return response()->json($note);
        }
        else {
            return response()->json([
                'error' => 'could not persist note to databse!'
            ]);
        }
    }
}
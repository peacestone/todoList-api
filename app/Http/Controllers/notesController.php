<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input as input;

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

         if (Input::hasFile('picture')){

            if (Input::file('picture')->isValid()){
                $file = Input::File('picture');
                $file->move('uploads', $file->getClientOriginalName());
                $note = new Note([
                    'img_url' => '/uploads/' . $file->getClientOriginalName(),
                ]);
                $task->notes()->save($note);
                Mail::to($task->email)->send(new NoteAdded($note, $task));
                return response()->json($note);
                    }
            else{
                return response()->json([
                    'error' => 'could not persist note to databse!'
                ]);
            }
        }
        else {
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
            };
        }
        
    }
}
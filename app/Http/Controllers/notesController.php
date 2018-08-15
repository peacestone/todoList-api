<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notesController extends Controller
{
    //
    public function index(Request $request, $id){

        $pageNumber = $request->input('page');
        return 'index page id ' . $id . ' ' . $pageNumber;
    }

    public function create(Request $request, $id){
        $content = $request->input('content');
        return 'created note: ' . $content;
    }
}

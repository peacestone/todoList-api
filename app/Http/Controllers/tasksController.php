<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tasksController extends Controller
{
    public function create(Request $request){
        $content = $request->input('content');
        return 'createdd task: ' . $content;
    }

    public function index(){
        return 'a bunch of tasks';
    }
}

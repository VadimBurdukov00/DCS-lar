<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Doer;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
    	return view('Tasks.index',[
        	'Tasks' => Task::get()
        ]);
    }

    public function addTask() {
    	return view('Tasks.add',[
    		'Task' => [],
        	'Doers' => Doer::get()
        ]);
    }

 	public function saveTask(Request $request) {
    	$task = Task::create($request->all());
    	if ($request->input('doers')){
    		$task->doers()->attach($request->input('doers'));
    	}
    }
}

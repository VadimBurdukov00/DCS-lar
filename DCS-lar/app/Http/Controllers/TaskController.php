<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Doer;

use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(Request $request) {
    	if (!empty($request->search)){
    		$Tasks = Task::where('name',  'LIKE', '%' . $request->search . '%')->get();
    	} else {
    		$Tasks = Task::get();
    	}
    	return view('Tasks.index',[
        	'Tasks' => $Tasks,
        	'search' => $request->search
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
    	if($request->input('doers')){
    		$task->doers()->attach($request->input('doers'));
    	}
    }


    public function viewTask($id) {
    	return view('Tasks.view',[
    		'Task' => Task::find($id),
        	'Doers' => Doer::get()
        ]);
    } 
    public function updateTask(Request $request) {
    	$task = Task::find($request -> id);
    	$task->update($request -> all());
    	$task->doers()->detach();
    	if($request->input('doers')){
    		$task->doers()->attach($request->input('doers'));
    	}	
    }

    public function deleteTask(Request $request) {
    	$task = Task::find($request -> id);
    	$task->delete();
    	$task->doers()->detach();
    }

}
<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Doer;
use App\Models\Status;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        $Tasks = Task::when($search, function ($Task, $search){
            return Task::where('name',  'LIKE', '%' . $search . '%');
        })->with('doers')->get();

    	return view('Tasks.index',[
        	'Tasks' => $Tasks,
        	'search' => $search,
            'Status'=> Status::get()
        ]);
    }


    public function addTask() {
    	return view('Tasks.add',[
    		'Task' => [],
        	'Doers' => Doer::get(),
            'Status'=> Status::get()
        ]);
    }
 	public function saveTask(Request $request) {
    	if($request->input('doers')){
            $task = Task::create($request->all());
    		$task->doers()->attach($request->input('doers'));
            $status = Status::find($request -> staus);
            return json_encode(array("info" => $task, "doers" => $task->doers()->pluck('name')->implode(', '), "status" => $status));
    	} else {
            return json_encode(array("info" => false));
        }

    }


    public function viewTask($id) {
    	return view('Tasks.view',[
    		'Task' => Task::find($id),
        	'Doers' => Doer::get(),
            'Status' =>Status::get(),
        ]);
    }
    public function updateTask(Request $request) {

    	if($request->input('doers')){
            $task = Task::find($request -> id);
            $task->update($request -> all());

            $task->doers()->detach();
    		$task->doers()->attach($request->input('doers'));
            return json_encode(array("updated" => true));
    	}	else {
            return json_encode(array("updated" => false));
        }
    }

    public function deleteTask(Request $request) {
    	$task = Task::find($request -> id);
    	$task->delete();
    	$task->doers()->detach();
        return json_encode(array("deleted" => true));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doer;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class DoerController extends Controller
{
    public function index() {
    	return view('Doers.index',[
        	'Doers' => Doer::get()
        ]);
    }

    public function addDoer() {
    	return view('Doers.add');
    }
 	public function saveDoer(Request $request)
    {
    	$Doer = Doer::create($request->all());
    }

    public function viewDoer($id) {
    	return view('Doers.view',[
    		'Doer' => Doer::find($id),
        ]);
    } 
    public function updateDoer(Request $request) {
    	$Doer = Doer::find($request -> id);
    	$Doer->update($request -> all());
    }

    public function deleteDoer(Request $request) {
    	$Tasks = Task::get();
    	$Doer = Doer::find($request -> id);	
    	foreach ($Tasks as $Task) {
    		$isDoer = $Task->doers()->where('id', $request->id)->count();
    		$doerCount = $Task->doers()->wherePivot('task_id', '=', $Task->id)->count();
    		if ($isDoer && $doerCount==1)
    			exit();
    	}

		$Doer = Doer::find($request -> id);	 	
    	$Doer->delete();
    	$Doer->tasks()->detach();
        return true;
    }
}

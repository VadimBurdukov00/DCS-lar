<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Doer;
use App\Models\Status;
use App\Models\Group;

class TaskController extends Controller
{
    public function index($search = '')
    {   
        

        $query =Task::join('statuses', 'tasks.status', '=', 'statuses.id')
            ->select('tasks.id as id', 'tasks.name as name', 'statuses.status as status', 'tasks.desc as desc')
            ;
        if($search)
        {
            $Tasks = $query-> where('name', 'LIKE', '%' . $search . '%')->get();
        } 
        else
        {
            $Tasks = $query->get();
        }
    	
        $Groups = Group::join('doers', 'groups.DoerId', '=', 'doers.id')->get();
    	return view('tasks.index', [
    		'Tasks' => $Tasks,
            'Groups' => $Groups,
            'search' => $search
    	]);
    }

    public function addTask()
    {
        $Statuses = Status::all();
        $Doers = Doer::all();
        return view('tasks.add',[
            'Statuses' => $Statuses,
            'Doers' => $Doers
        ]);
    }

    public function saveTask(Request $request)
    {
       /* */
        $Task = new Task();

        //$Task->doerId = $request->doerId;
        $Task->name  = $request->name ;
        $Task->status = $request->status;
        $Task->desc = $request->desc;
        
        $Task->save();
       // return json_encode(array('result' => true, "view" => ));
        //
        foreach ($request->doerIds as $id) 
        {
            $Group = new Group();
            $Group->TaskId = $Task->id;
            $Group->DoerId = $id;

            $Group->save();
        }
        return $this->index();
    }

    public function viewTask($id)
    {
        $Task = Task::find($id);
        $Statuses = Status::all();
       
       /* $Groups = Group::join('doers', 'groups.DoerId', '=', 'doers.id')->where('taskId', '=', $id)->get();*/
       $UsedDoers = Doer::join('groups', 'doers.id','=','groups.DoerId',)->where('taskId', '=', $id)->get();
        foreach ($UsedDoers as $UsedDoer)
        {
            $UsedIds[] = $UsedDoer->id;
        }
     
        $Doers = Doer::all()->whereNotIn('id', $UsedIds);

        return view('tasks.view', [
            'Task' => $Task,
            'Statuses' => $Statuses,
            'Doers' => $Doers, 
            //'Groups' => $Groups,
            'UsedDoers' => $UsedDoers
        ]);
    }

    public function updateTask(Request $request)
    {
    	$Task = Task::find($request->id);
        $GroupIds = Group::select('DoerId')->where('TaskId', '=', $request->id)->get();
        /*$idArr = [];
        foreach ($GroupIds as $GroupId) 
        {
            $idArr[] = $GroupId->DoerId;
        }
*/
        
        //unset($Id);
    	//$Task->doerId = $request->doerId;
    	$Task->name  = $request->name ;
    	$Task->status = $request->status;
    	$Task->desc = $request->desc;

    	$Task->save();

        //$result = array_merge($idArr, $request->doerIds);
        if($request->doerIds)
        {
            foreach ($request->doerIds as $id) 
            {
                $Group = new Group();
                $Group->TaskId = $request->id;
                $Group->DoerId = $id;
                
                $Group->save();
     
            }
        }
            
        return $this->index();
    }

    

    public function deleteTask($id)
    {
    	$Task = Task::find($id);
    	$Task->delete();

        $Group = Group::where('TaskId','=',$id);
        $Group->delete();

        echo json_encode(array('result' => true));
    }

   

    public function searchTask(Request $request)
    {
        $name = $request->searchParam;
        $filterCount = Task::where('name', 'LIKE', '%' . $name . '%')->count();
        /*return view('tasks.index', [
            'Tasks' => $Tasks
        ]);
        return json_encode(array('result' => $Tasks));*/
        return $filterCount;
    }
}

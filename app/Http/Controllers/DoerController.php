<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doer;
use App\Models\Group;

class DoerController extends Controller
{
    public function index()
    {   
        $Doers = Doer::all();

    	return view('doers.index', [
            'Doers' => $Doers,
    	]);
    }

    public function viewDoer($id)
    {
    	$Doer = Doer::find($id);

    	return view('doers.view', [
            'Doer' => $Doer
    	]);
    	//return $id;
    }

    public function addDoer()
    {
        return view('doers.add');
    }

    public function updateDoer(Request $request)
    {
    	$Doer = Doer::find($request->id);

    	$Doer->FCs = $request->FCs;
    	$Doer->post  = $request->post ;

    	$Doer->save();

        return $this->index();
        //return $request;
    }

    public function saveDoer(Request $request)
    {
    	$Doer = new Doer();

      	$Doer->FCs = $request->FCs;
    	$Doer->post  = $request->post ;
        
        $Doer->save();
       // return $request;
        return $this->index();
    }

    public function deleteDoer($id)
    {
        $delAvailable = true;
        $DoerFilter = Group::all()->groupBy('TaskId');
        foreach ($DoerFilter as $Task=>$TaskInfo)
        {
            if(count($TaskInfo) == 1)
            {
                foreach ($TaskInfo as $Param=>$ParamValue)
                {
                    $idCheck = $ParamValue["DoerId"];
                    if($idCheck ==$id)
                        return json_encode(array('result' => false));
                }
            }
        }
        // $DoerCount = $DoerFilter->count();
    	$Doer = Doer::find($id);
    	$Doer->delete();

        $Group = Group::where('DoerId','=',$id);
        $Group->delete();
        
        return json_encode(array('result' => true));
        
    }

}

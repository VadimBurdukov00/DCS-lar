<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Doer;
use \Illuminate\Contracts\View\View;

class DoerController extends Controller{

    public function index(): View
    {
    	return view('Doers.index',[
        	'Doers' => Doer::get()
        ]);
    }

    public function addDoer(): View
    {
    	return view('Doers.add');
    }
 	public function saveDoer(Request $request): JsonResponse
    {
        $data = ["created" => false];
    	if($Doer = Doer::create($request->all()))
        {
            $data = [
                "created" => true,
                "info" => $request->all(),
                "id" => $Doer->id
            ];
        }
        return response()->json($data);
    }

    public function viewDoer(int $id): View
    {
    	return view('Doers.view',[
    		'Doer' => Doer::find($id),
        ]);
    }

    public function updateDoer(Request $request): JsonResponse
    {
        $data = ["updated" => true];

    	if($Doer = Doer::find($request -> id))
    	{
            if(!$Doer->update($request -> all()))
            {
                $data = ["updated" => false];
            }
        }
    	else
    	{
            $data = ["updated" => false];
        }
        return response()->json($data);
    }

    public function deleteDoer(Request $request): JsonResponse
    {
    	$Doer = Doer::find($request -> id);
        $data = ["deleted" => true];
        if (!$Doer->delete())
        {
            $data["deleted"] = false;
        }
        return response()->json($data);
    }
}

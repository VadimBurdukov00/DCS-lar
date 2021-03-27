<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doer;

class DoerController extends Controller
{
    public function index() {
    	return view('Doers.index',[
        	'Doers' => Doer::get()
        ]);
    }
}

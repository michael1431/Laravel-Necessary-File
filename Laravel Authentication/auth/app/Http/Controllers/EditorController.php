<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('editor')->except('test');
    }


    public function index(){
    	// only editor can access this.bcz we used editor middleware here

    	return view('admin.editor');
    }

    public function test(){
    	// this function can be accessed by both admin and editor bcz it's not under the middleware
    	return view('admin.test');
    }
}

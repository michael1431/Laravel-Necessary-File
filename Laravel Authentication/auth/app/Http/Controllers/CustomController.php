<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class CustomController extends Controller

{
// show the register form
public function showRegisterForm(){

	return view('custom.register');
}

public function validation(Request $request)
{
    // validation
    $this->validate($request, [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' =>'required|email|unique:users',
        'password'=> 'required|min:6|confirmed',
        'phone_no' =>'required|unique:users',
    ]);

    // The blog post is valid, store in database...
}

public function register(Request $request){

	$this->validation($request);
    // after validation we insert all the data in db

    $request["password"] = bcrypt($request->password);
	User::create($request->all());
    
    return redirect('/')->with('Status','You are registered successfully!!');

}


// code for login 

public function showLoginForm()
{

    return view('custom.login');
}


public function login(Request $request){

        // validation 

         $this->validate($request, [
        'email' =>'required|email',
        'password'=> 'required',
       
    ]);


    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

        return redirect('/');
    }else{
        session()->flash('sticky_error','Email Or Password Not Match');
        return back();
    }


}

}

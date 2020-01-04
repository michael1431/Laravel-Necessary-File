<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use Auth;
class PostController extends Controller
{
    

     public function __construct()
    {
    	// Only authenticate user can post 
        $this->middleware('auth');
    }

    public function store(Request $request){

    	$post = new Post();

    	$post->title = $request->title;
    	$post->description = $request->description;
    	$post->category_id = $request->category_id;
    	$post->user_id = Auth::id();
    	// we can take this also by Auth::user()->id;
    	// where user function  hold all the data of user table


    	$post->save();

        // post save haor por then amra post id pabo 
        // sync function e array ta passs korte hoi and insert er samoi false and update er samoi kichu na dileo hoi sync er vitore
        // tag table e tag gulo save kore nibe 


        $post->tags()->sync($request->tags,false);

    	return redirect('/home');


    }

    public function category($id){

        $category = Category::find($id);

        return view('category', compact('category'));
    }

   
}

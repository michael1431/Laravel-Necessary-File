<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
//use App\Post;

use Auth;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
       // $posts = Post::all();

        $user = Auth::user();
        // send the user object so that every user can see their posts 

        $categories = Category::orderBy('name','asc')->get();
        $tags = Tag::orderBy('name','asc')->get();
        return view('home', compact('categories','user','tags'));
    }
}

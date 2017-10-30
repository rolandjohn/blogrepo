<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()

    {

        $this->middleware('auth')->except(['index','show']);

    }

    public function index(Posts $posts)
    {

       // dd($posts);
       $posts = $posts->all();
       // $posts = (new \App\Repositories\Posts)->all();
    	// $posts = Post::latest()
     //    ->filter(request(['month', 'year']))
     //    ->get();

       

    	return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
    	//$post = Post::find($id);
    	return view('posts.show', compact('post'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
    	$this->validate(request(),[
    		'title' => 'required',
    		'body' => 'required'
    	]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has been published.');
    	//redirect to the home page
    	return redirect('/');
    }
}

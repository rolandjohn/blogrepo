<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{

    public function __construct()

    {

        $this->middleware('auth')->except(['index','show']);

    }

    public function index()
    {
    	$posts = Post::latest()->get();
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

    	//redirect to the home page
    	return redirect('/');
    }
}

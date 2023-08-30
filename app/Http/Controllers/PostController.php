<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        //select * from posts;
        $postsFromDB = Post::all(); //collection object

        //id, title (Var char), description(TEXT), created_at, updated_at

        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show($postId)
    {
        //select * from posts where id = $postId;
        $singlePostFromDB = Post::find($postId); //model object

//        $singlePostFromDB = Post::where('id', $postId)->first(); //model object

//        $singlePostFromDB = Post::where('id', $postId)->get(); //collection object


//        Post::where('title', 'php')->first() //select * from posts where title = 'php' limit 1;
//        Post::where('title', 'php')->get() //select * from posts where title = 'php';


        return view('posts.show', ['post' => $singlePostFromDB]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
//        $request = request();
//
//        dd($request->title, $request->all());

        //1- get the user data
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

//        dd($data, $title, $description, $postCreator);

        //2- store the user data in database

        //3- redirection to posts.index
        return to_route('posts.index');
    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function update()
    {
        //1- get the user data

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

//        dd($title, $description, $postCreator);

        //2- update the user data in database

        //3- redirection to posts.show

        return to_route('posts.show', 1);
    }

    public function destroy()
    {
        //1- delete the post from database

        //2- redirect to posts.index
        return to_route('posts.index');
    }
}

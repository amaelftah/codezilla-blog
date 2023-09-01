<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        //select * from posts;
        $postsFromDB = Post::all(); //collection object

        //id, title (Var char), description(TEXT), created_at, updated_at

        return view('posts.index', ['posts' => $postsFromDB]);
    }

    //convention over configuration
    public function show(Post $post) //type hinting
    {
        //select * from posts where id = $postId limit 1;
//        $singlePostFromDB = Post::find($postId); //model object
//        $singlePostFromDB = Post::findOrFail($postId); //model object

//        if(is_null($singlePostFromDB)) {
//            return to_route('posts.index');
//        }

//        $singlePostFromDB = Post::where('id', $postId)->first(); //model object

//        $singlePostFromDB = Post::where('id', $postId)->get(); //collection object


//        Post::where('title', 'php')->first() //select * from posts where title = 'php' limit 1;
//        Post::where('title', 'php')->get() //select * from posts where title = 'php';


        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        //select * from users;
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {
        //code to validate the data

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

//        $request = request();
//
//        dd($request->title, $request->all());

        //1- get the user data
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

//        dd($data, $title, $description, $postCreator);

        //2- store the submitted data in database
//        $post = new Post;
//
//        $post->title = $title;
//        $post->description = $description;
//
//        $post->save();// insert into posts ('t','d')

        Post::create([
            'title' => $title,
            'description' => $description,
            'xyz' => 'some value', //ignore,
            'user_id' => $postCreator,
        ]);

        //3- redirection to posts.index
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        //select * from users;
        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update($postId)
    {
        //1- get the user data

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

//        dd($title, $description, $postCreator);

        //2- update the submitted data in database
            //select or find the post
            //update the post data
        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

//        dd($singlePostFromDB);

        //3- redirection to posts.show

        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {
        //1- delete the post from database
            //select or find the post
            //delete the post from database
        $post = Post::find($postId);
        $post->delete();

        Post::where('id', $postId)->delete();

        //2- redirect to posts.index
        return to_route('posts.index');
    }
}

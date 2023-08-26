<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['id' => 1 , 'title' => 'PHP', 'posted_by' => 'Ahmed', 'created_at' => '2022-10-10 09:00:00'],
            ['id' => 2 , 'title' => 'Javascript', 'posted_by' => 'Mohamed', 'created_at' => '2023-08-20 07:00:00'],
            ['id' => 3 , 'title' => 'HTML', 'posted_by' => 'Mahmoud', 'created_at' => '2023-10-06 06:00:00'],
            ['id' => 4 , 'title' => 'CSS', 'posted_by' => 'Ali', 'created_at' => '2023-08-07 05:00:00'],
        ];
        return view('posts.index', ['posts' => $allPosts]);
    }

    public function show($postId)
    {
        $singlePost = [
            'id' => 1 , 'title' => 'PHP', 'description' => 'this is description', 'posted_by' => 'Ahmed', 'created_at' => '2022-10-10 09:00:00'
        ];

        return view('posts.show', ['post' => $singlePost]);
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
}

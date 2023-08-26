<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testAction()
    {
        $allPosts = [
            ['id' => 1 , 'title' => 'PHP', 'posted_by' => 'Ahmed', 'created_at' => '2022-10-10 09:00:00'],
            ['id' => 2 , 'title' => 'Javascript', 'posted_by' => 'Mohamed', 'created_at' => '2023-08-20 07:00:00'],
            ['id' => 3 , 'title' => 'HTML', 'posted_by' => 'Mahmoud', 'created_at' => '2023-10-06 06:00:00'],
            ['id' => 4 , 'title' => 'CSS', 'posted_by' => 'Ali', 'created_at' => '2023-08-07 05:00:00'],
        ];
        return view('test', ['posts' => $allPosts]);
    }
}

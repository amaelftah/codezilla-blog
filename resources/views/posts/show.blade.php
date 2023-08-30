@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post->title}}</h5>
            <p class="card-text">Description: {{$post->description}}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: Ahmed</h5>
            <p class="card-text">Email: ahmed@gmail.com</p>
            <p class="card-text">Created At: Thursday 25th of December 1975 02:15:16 PM</p>
        </div>
    </div>
@endsection




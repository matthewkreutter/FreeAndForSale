@extends('layouts.app')
@section('title')
        <title>Welcome</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <div class="title">
                Free And For Sale
            </div>
            @if(Auth::check())
                <h2>Welcome, {{Auth::user()->name}}</h2>
            @endif
            <div class="links">
                <br><br><br>
                <a href="/items">See All Available Items</a>
                <a href="/users">See All Current Users</a>
                <br><br><br>
                <a href="http://www.arl.wustl.edu/~todd/cse330/index.html" target="_blank">Made For CSE330</a>
                <a href="https://bitbucket.org/matthewkreutter/fall2016-cp-matthew-kreutter-435368-jordan-franklin-437921" target="_blank">BitBucket Repo</a>
            </div>
        </div>
    </div>
@stop
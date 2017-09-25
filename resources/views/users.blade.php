@extends('layouts.app')
@section('title')
        <title>Users</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h2>All Users</h2>
            <form method="GET">
                <label for="searchUsers">Search Users:</label>
                <input type="text" name="searchUsers" id="searchUsers">
                <input type="submit" value="Search">
            </form>
            <table class="table table-striped text-left">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                @foreach ($users as $user)
                <?php
                    if (isset($_GET['searchUsers'])) {
                        if(preg_match("/.*".$_GET['searchUsers'].".*/i", $user->name)) {
                ?>
                        <tr>
                            <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                        </tr>
                <?php
                        }
                    }
                    else {
                ?>
                        <tr>
                            <td><a href="/users/{{$user->id}}">{{$user->name}}</a></td>
                            <td>{{$user->email}}</td>
                        </tr>
                <?php
                    }
                ?>
                @endforeach
            </table>
            <div class="links">
                <a href="/items">See All Available Items</a>
            </div>
        </div>
    </div>
@stop
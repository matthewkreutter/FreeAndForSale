@extends('layouts.app')
@section('title')
        <title>Show User</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h2>User Profile: {{$user->name}}</h2>
            <table class="table table-striped table-med-width text-left">
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th class="item-wide-col">Description</th>
                    <th class="item-wide-col">Image</th>
                </tr>
                @foreach ($user->items as $item)    
                    <tr>
                        <td><a href="/items/{{$item->id}}">{{$item->name}}</a></td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->description}}</td>
                        <td><img src='/img/{{$item->image}}' class="item-img"></td>
                    </tr>
                @endforeach
            </table>
            <div class="links">
                <a href="/items">See All Available Items</a><br>
                <a href="/users">See All Current Users</a>
            </div>
        </div>
    </div>
@stop
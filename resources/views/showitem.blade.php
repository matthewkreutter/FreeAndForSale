@extends('layouts.app')
@section('title')
        <title>Show Item</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h2>Item: {{$item->name}}</h2>
            <table class="table table-striped table-med-width text-left">
                <tr>
                    <th>Owner</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th class="item-wide-col">Description</th>
                    <th class="item-wide-col">Image</th>
                </tr>
                <tr>
                    <td><a href="/users/{{$item->user_id}}">{{$item->user()->first()->name}}</a></td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->category}}</td>
                    <td>{{$item->description}}</td>
                    <td><img src='/img/{{$item->image}}' class="item-img"></td>
                </tr>
            </table>
            <div class="links">
                @if (Auth::user()->id == $item->user_id)
                <a href="/items/{{$item->id}}/edit">Edit Item</a>
                <a href="/items/{{$item->id}}/remove">Delete Item</a><br><br>
                @endif
                <a href="/items">See All Available Items</a><br>
                <a href="/users">See All Current Users</a>
            </div>
        </div>
    </div>
@stop
@extends('layouts.app')
@section('title')
        <title>Items</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h2><a href="/items">All Items</a></h2>
            <div class="links">
                <a href="?category=Vehicles">Vehicles</a>
                <a href="?category=Supplies">Supplies</a>
                <a href="?category=Clothes">Clothes</a>
                <a href="?category=Electronics">Electronics</a>
                <a href="?category=Other">Other</a>
            </div>
            <br>
            <form method="GET">
                <label for="searchItems">Search Items:</label>
                <input type="text" name="searchItems" id="searchItems">
                <input type="submit" value="Search">
            </form>
            <br>
            <form method="GET">
                <label for="searchPrice">Search By Max Price:</label>
                <input type="number" step="0.01" name="searchPrice" id="searchPrice">
                <input type="submit" value="Search">
            </form>
            <br>
            <form action="/additem/">
                <button type="submit" class="btn btn-primary">Add New Item</button>
            </form>
            <br>
            <table class="table table-striped table-med-width text-left">
                <tr>
                    <th>Owner</th>
                    <th><a href="?sortBy=name">Item Name</a></th>
                    <th><a href="?sortBy=price">Price</a></th>
                    <th>Category</th>
                    <th class="item-wide-col">Description</th>
                    <th class="item-wide-col">Image</th>
                </tr>
                <?php 
                    $sorted = $items;
                    if (isset($_GET['sortBy'])) {
                        $sorted = $items->sortBy($_GET['sortBy']); 
                    }
                ?>
                @foreach ($sorted as $item)
                    <?php
                        if (isset($_GET['category'])) {
                            if($item->category == $_GET['category']) {
                    ?>
                                <tr>
                                    <td><a href="/users/{{$item->user_id}}">{{$item->user()->first()->name}}</a></td>
                                    <td><a href="/items/{{$item->id}}">{{$item->name}}</a></td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->category}}</td>
                                    <td>{{$item->description}}</td>
                                    <td><img src='/img/{{$item->image}}' class="item-img"></td>
                                </tr>
                    <?php
                            }
                        }
                        else if (isset($_GET['searchItems'])) {
                            //if($item->name == $_GET['search'] || $item->user()->first()->name == $_GET['search']) {
                            if(preg_match("/.*".$_GET['searchItems'].".*/i", $item->name) || preg_match("/.*".$_GET['searchItems'].".*/i", $item->user()->first()->name)) {
                    ?>
                            <tr>
                                <td><a href="/users/{{$item->user_id}}">{{$item->user()->first()->name}}</a></td>
                                <td><a href="/items/{{$item->id}}">{{$item->name}}</a></td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{$item->description}}</td>
                                <td><img src='/img/{{$item->image}}' class="item-img"></td>
                            </tr>
                    <?php
                            }
                        }
                        else if (isset($_GET['searchPrice'])) {
                            //if($item->name == $_GET['search'] || $item->user()->first()->name == $_GET['search']) {
                            if($item->price <= $_GET['searchPrice']) {
                    ?>
                            <tr>
                                <td><a href="/users/{{$item->user_id}}">{{$item->user()->first()->name}}</a></td>
                                <td><a href="/items/{{$item->id}}">{{$item->name}}</a></td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{$item->description}}</td>
                                <td><img src='/img/{{$item->image}}' class="item-img"></td>
                            </tr>
                    <?php
                            }
                        }
                        else {
                    ?>
                            <tr>
                                <td><a href="/users/{{$item->user_id}}">{{$item->user()->first()->name}}</a></td>
                                <td><a href="/items/{{$item->id}}">{{$item->name}}</a></td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->category}}</td>
                                <td>{{$item->description}}</td>
                                <td><img src='/img/{{$item->image}}' class="item-img"></td>
                            </tr>
                    <?php
                        }
                    ?>
                @endforeach
            </table>
            <!--
            <div class="links">
                <a href="/users">See All Current Users</a>
            </div>
            -->
            <!--
            <form method="POST" action="/items">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name">Item Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <label for="price">Item Price:</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control">
                    <label for="description">Item Description:</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    <label for="image">Upload Image:</label>
                    <input name="image" type="file" id="image" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Item</button>
                </div>
            </form>
            -->
        </div>
    </div>
@stop
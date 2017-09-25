@extends('layouts.app')
@section('title')
        <title>Edit Item</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h3>Edit Item</h3>
            <?php
                echo Form::open(array('url' => '/items/'.$item->id,'files'=>'true', 'class' => 'form-group', 'method' => 'PATCH'));
                    echo Form::token();

                    echo Form::label('name', 'Item Name:');
                    echo Form::text('name', $item->name, ['class' => 'form-control', 'required' => 'required']);

                    echo Form::label('price', 'Item Price:');
                    echo Form::number('price', $item->price, ['class' => 'form-control', 'step' => '0.01', 'required' => 'required']);

                    echo Form::label('description', 'Item Description:');
                    echo Form::text('description', $item->description, ['class' => 'form-control', 'required' => 'required']);

                    echo Form::label('category', 'Item Category:');
                    echo Form::select('category', array('Vehicles' => 'Vehicles', 'School Supplies' => 'Supplies', 'Clothes' => 'Clothes', 'Electronics' => 'Electronics', 'Other' => 'Other'), $item->category);

                    echo Form::label('image', 'Upload Image:');
                    echo Form::file('image', ['required' => 'required']);

                    echo Form::submit('Edit Item', ['class' => 'btn btn-primary']);
                echo Form::close();
            ?>
            <div class="links">
                <a href="/items/{{$item->id}}">Cancel</a><br>
            </div>
        </div>
    </div>
@stop
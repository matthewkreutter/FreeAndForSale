@extends('layouts.app')
@section('title')
        <title>Add Item</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h3>Add Item</h3>
            <?php
                echo Form::open(array('url' => '/items','files'=>'true', 'class' => 'form-group'));
                    echo Form::token();

                    echo Form::label('name', 'Item Name:');
                    echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']);

                    echo Form::label('price', 'Item Price:');
                    echo Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'required' => 'required']);

                    echo Form::label('description', 'Item Description:');
                    echo Form::text('description', null, ['class' => 'form-control', 'required' => 'required']);

                    echo Form::label('category', 'Item Category:');
                    echo Form::select('category', array('Vehicle' => 'Vehicle', 'Supplies' => 'Supplies', 'Clothes' => 'Clothes', 'Electronics' => 'Electronics', 'Other' => 'Other'));

                    echo "<br>";

                    echo Form::label('image', 'Upload Image:');
                    echo Form::file('image', ['required' => 'required']);

                    echo Form::submit('Add Item', ['class' => 'btn btn-primary']);
                echo Form::close();
            ?>
            <div class="links">
                <a href="/items">Cancel</a><br>
                <a href="/items">See All Available Items</a><br>
                <a href="/users">See All Current Users</a>
            </div>
        </div>
    </div>
@stop
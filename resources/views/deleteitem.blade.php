@extends('layouts.app')
@section('title')
        <title>Delete Item</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h3>Delete Item</h3>
            <h4>Are you sure you want to delete this item?</h4>
            <?php
                echo Form::open(array('url' => '/items/'.$item->id,'files'=>'true', 'class' => 'form-group', 'method' => 'delete'));
                    echo Form::token();

                    echo Form::submit('Delete Item', ['class' => 'btn btn-primary']);
                echo Form::close();
            ?>
            <div class="links">
                <a href="/items/{{$item->id}}">Cancel</a><br>
            </div>
        </div>
    </div>
@stop
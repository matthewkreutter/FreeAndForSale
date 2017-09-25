@extends('layouts.app')
@section('title')
        <title>Settings</title>
@stop

@section('content')
    <div class="flex-center position-ref">
        <div class="content">
            <h2>Settings</h2><br>
            @if (Session::has('status_message'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('status_message') }}
                </div>
            @endif
            <?php
                echo Form::open(array('url' => '/settings/changepassword','files'=>'true','class' => 'form-group'));
                    echo Form::token();

                    echo Form::label('old_password', 'Old Password:');
                    echo Form::password('old_password', ['class'=>'form-control']);

                    echo Form::label('new_password', 'New Password:');
                    echo Form::password('new_password', ['class'=>'form-control']);

                    echo Form::label('new_password_confirmation', 'New Password Confirmation:');
                    echo Form::password('new_password_confirmation', ['class'=>'form-control']);

                    echo Form::submit('Change Password', ['class' => 'btn btn-primary']);
                echo Form::close();
            ?>
            <div class="links">
                <a href="/items">See All Available Items</a><br>
                <a href="/users">See All Current Users</a>
            </div>
        </div>
    </div>
@stop
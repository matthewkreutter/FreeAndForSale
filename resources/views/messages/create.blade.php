@extends('layouts.app')
@section('title')
        <title>Create Message</title>
@stop

@section('content')
    <div class="container content">
        <h1>Create a new message</h1>
        {!! Form::open(['route' => 'messages.store']) !!}
            <!-- Recipient Form Input -->
            <div class="form-group">
                {!! Form::label('recipient', 'Recipient', ['class' => 'control-label']) !!}
                {!! Form::text('recipient', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <!-- Subject Form Input -->
            <div class="form-group">
                {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
                {!! Form::text('subject', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
                {!! Form::textarea('message', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            
            <!-- Submit Form Input -->
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop
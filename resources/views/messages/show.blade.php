@extends('layouts.app')
@section('title')
        <title>Show Messages</title>
@stop

@section('content')
	<div class="container">
	    <div class="col-md-6 content">
	        <h2>Add a new message</h2>
	        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
	        <!-- Message Form Input -->
	        <div class="form-group">
	            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
	        </div>

	        <!-- Submit Form Input -->
	        <div class="form-group">
	            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
	        </div>
	        {!! Form::close() !!}
	    </div>
	    <div class="col-md-6 content">
	        <h1>{{ $thread->subject }}</h1>

	        @foreach($thread->messages as $message)
	            <div class="media">
	                <div class="media-body">
	                    <h5 class="media-heading">{{ $message->user->name }}</h5>
	                    <p>{{ $message->body }}</p>
	                    <div class="text-muted"><small>Posted {{ $message->created_at->diffForHumans() }}</small></div>
	                </div>
	            </div>
	        @endforeach
	    </div>
    </div>
@stop
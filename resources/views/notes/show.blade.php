@extends('layouts.app')

@section('content')

    <a class="btn btn-default" href="/notes">Go back</a>

    <br>
    <br>
    <div class="col-md-12">
        <h1>{{ $note->title }}</h1>
        <p>{{ $note->body }}</p>
        <hr>
        <small>Written on: {{ $note->created_at }}</small>
    </div>
    <hr>
    @if (!Auth::guest())
        @if (Auth::user()->id == $note->user_id)
            <a href="/notes/{{ $note->id }}/edit" class="btn btn-default"> Edit </a>
            {!! Form::open(['action' => ['App\Http\Controllers\NotesController@destroy', $note->id], 'method' => 'NOTE', 'class' => 'pull-right']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
        @endif
    @endif
@endsection

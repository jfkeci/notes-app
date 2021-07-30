@extends('layouts.app')

@section('content')
    <h1>Create note</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\NotesController@store', 'method' => 'POST']) !!}

    <div class="form-group">
        <select name="category" id="category" class="form-select form-select-lg mb-3">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Content']) }}
    </div>

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

@endsection

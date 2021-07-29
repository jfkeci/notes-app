@extends('layouts.app')

@section('content')
    <h1>Edit note</h1>

    {!! Form::open(['action' => ['App\Http\Controllers\NotesController@update', $note->id], 'method' => 'POST']) !!}

    <div class="form-group">
        <select name="category" id="" class="form-select form-select-lg mb-3">
            @foreach ($categories as $category)
                @if ($category->id === $note->category_id)
                    <option selected value="{{ $category->id }}">{{ $category->category }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $note->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', $note->body, ['class' => 'form-control', 'placeholder' => 'Content']) }}
    </div>

    {{ Form::hidden('_method', 'PUT') }}

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

@endsection

@extends('layouts.app')

@section('content')
    <h1>Create category</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\CategoriesController@store', 'method' => 'POST']) !!}

    <div class="form-group">
        {{ Form::label('category', 'Category') }}
        {{ Form::text('category', '', ['class' => 'form-control', 'placeholder' => 'Category']) }}
    </div>

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

@endsection

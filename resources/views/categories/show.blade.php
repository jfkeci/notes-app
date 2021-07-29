@extends('layouts.app')

@section('content')

    <a class="btn btn-default" href="/categories">Go back</a>

    <br>
    <br>
    <div class="col-md-12">
        <h1>{{ $category->category }}</h1>
        <hr>
        <small>Written on: {{ $category->created_at }}</small>
    </div>
    <hr>

    <a href="/categories/{{ $category->id }}/edit" class="btn btn-default"> Edit </a>
    {!! Form::open(['action' => ['App\Http\Controllers\CategoriesController@destroy', $category->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}


@endsection

@extends('layouts.app')

@section('content')

    <a class="btn btn-default" href="/categories">Go back</a>

    <br>
    <br>
    <div class="col-md-12">
        <h1>{{ $category->category }}</h1>
        <hr>
        <small>Created: {{ $category->created_at }}</small>
    </div>
    <hr>

    <a href="/categories/{{ $category->id }}/edit" class="btn btn-default"> Edit </a>
    {!! Form::open(['action' => ['App\Http\Controllers\CategoriesController@destroy', $category->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}

    <hr>

    @if (count($notes) > 0)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Notes by Category: {{ $category->category }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <a href="/notes/create" class="btn btn-primary">Create Note</a>
                            <hr>
                            <h3>Your Notes</h3>

                            @if (count($notes) > 0)
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    @foreach ($notes as $note)
                                        <tr>
                                            <th><a href="/notes/{{ $note->id }}">{{ $note->title }}</a></th>
                                            <th><a href="/notes/{{ $note->id }}/edit" class="btn btn-default">Edit</a>
                                            </th>
                                            <th>
                                                {!! Form::open(['action' => ['App\Http\Controllers\NotesController@destroy', $note->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Delete', ['class' => 'btn-btn-danger']) }}
                                                {!! Form::close() !!}
                                            </th>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p>You have no notes</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h3>No notes found for this category</h3>
    @endif


@endsection

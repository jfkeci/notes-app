@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

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
                                        <th><a href="/notes/{{ $note->id }}/edit" class="btn btn-default">Edit</a></th>
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
@endsection

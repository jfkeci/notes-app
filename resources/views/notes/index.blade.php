@extends('layouts.app')

@section('content')
    <h1>Notes</h1>

    <br>
    {!! Form::open(['action' => ['App\Http\Controllers\NotesController@index', $category_id], 'method' => 'POST']) !!}
    <div class="form-group">
        <select name="category" id="" class="form-select form-select-lg mb-3">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
    </div>
    {{ Form::hidden('_method', 'PUT') }}

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}
    @if (count($notes) > 0)
        <div class="card">
            <ul class="list-group list-group-flash">
                @foreach ($notes as $note)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="/notes/{{ $note->id }}">
                                    <h3>{{ $note->title }}</h3>
                                </a>
                                <small>{{ $note->created_at }}</small>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

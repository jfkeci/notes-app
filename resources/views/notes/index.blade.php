@extends('layouts.app')

@section('content')
    <h1>Notes</h1>

    <br>

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

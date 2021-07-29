@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <br>
    <hr>
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="contactBody" class="form-label">Message</label>
            <textarea type="text" class="form-control" id="contactBody"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection

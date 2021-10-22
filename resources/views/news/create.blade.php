@extends('layouts.app')
@section('title','Create a news')

@section('content')
<form action="/create/news" method="POST">
    @csrf
    <div class="form group">
        <label for="title">Title</label>
        <input placeholder="Enter title" id="title" name="title" type="text" class="form-control">
        @error('title')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form group">
        <label for="content">Content</label>
        <textarea placeholder="Enter content" name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        @error('content')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <div>
            <p>Select teams:</p>
            @foreach($teams as $team)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="team-{{$team->id}}" name="teams[]" value="{{$team->id}}">
                <label for="team-{{$team->id}}" class="form-check-label">{{$team->name}}</label>
            </div>
            @endforeach
            @error('teams')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@extends('layouts.app')

@section('title','NBA')

@section('content')
<h2>
    {{$team->name}}
</h2>
<p>
    {{$team->email}}
</p>
<p>
    {{$team->address}}
</p>
<p>
    {{$team->city}}
</p>

<h5>Players
</h5>
@forelse($team->players as $player)
<a href="{{route('player',['player'=> $player->id])}}">
    {{$player->first_name}} {{$player->last_name}}
</a>
@empty<span>No players</span>
@endforelse

<h5>Comments
</h5>
@forelse($team->comments as $comment)
{{$comment->content}}
@empty<span>No comments</span>
@endforelse
<form class="mt-3" action="{{route('createComment',['team'=> $team->id])}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="content">Add comment:</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        @error('content')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn-primary">Submit</button>
</form>


@endsection
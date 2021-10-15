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

@endsection
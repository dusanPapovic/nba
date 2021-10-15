@extends('layouts.app')

@section('title','NBA')

@section('content')
<h2>
    {{$player->first_name}}
</h2>
<h2>
    {{$player->last_name}}
</h2>
<p>
    {{$player->email}}
</p>
<a href="{{route('team',['team'=> $player->team_id])}}">
    <p>
        {{$player->team->name}}
    </p>
</a>

@endsection
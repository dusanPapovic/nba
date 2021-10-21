
@extends('layouts.app')

@section('title','News News')

@section('content')
<h2>
    {{$news->title}}
</h2>
<p>
    {{$news->content}}
</p>
 <p>
    {{$news->user->email}}
</p>  
<h5>Teams</h5>
@foreach ($news->teams as $team)

        {{$team->name}}
</br>

@endforeach

@endsection 
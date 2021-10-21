@extends('layouts.app')

@section('title','New')

@section('content')
<h5>
    {{$news->title}}
</h5>
<p>
    {{$news->content}}
</p>

<p>
    {{$news->user->name}}
</p>
<p>
    {{$news->user->email}}
</p>

@endsection
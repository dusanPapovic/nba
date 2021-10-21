@extends('layouts.app')

@section('title','News')
@section('content')
<h1>News</h1>
<ul>
    @foreach($news as $new)
    <li>
        <a href="{{ route('news', ['news' => $new->id ]) }}">
            {{ $new->title }}
        </a> -  {{$new->user->name}}
    </li>
    @endforeach
</ul>
{{ $news->links() }}
@endsection
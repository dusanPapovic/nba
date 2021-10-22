 @extends('layouts.app')

@section('title','TeamNews')
@section('content')
<h1>News</h1>
<ul>
    @foreach($news as $new)
    <li>
            {{ $new->title }}
    </li>
    @endforeach
</ul>
{{ $news->links() }}
@endsection

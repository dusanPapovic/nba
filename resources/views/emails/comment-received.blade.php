<html>
    <body>
        <div>
            <p>Hello {{ $team->name }}, you get comment</p>

            <blockquote>
                {{$comment->content}}
            </blockquote>
        </div>
    </body>
</html>
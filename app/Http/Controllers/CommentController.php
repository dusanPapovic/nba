<?php

namespace App\Http\Controllers;

use App\Team;
use App\Http\Requests\CreateCommentRequest;
use App\Comment;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Team $team, CreateCommentRequest $request)
    {
        $data = $request->validated();
        $data1 = ['team_id' => $team->id, 'user_id' => auth()->user()->id];
        $comment=Comment::create(array_merge($data, $data1));
        // $team->comments()->create($data);
        //auth()->user()->comments()->create($data);

        Mail::to($team)->send(
            new CommentReceived(
                auth()->user(),
                $team,
                $comment,
            )
        );

        return redirect('/teams' . '/' . $team->id);
    }
}

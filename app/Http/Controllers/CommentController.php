<?php

namespace App\Http\Controllers;

use App\Team;
use App\Http\Requests\CreateCommentRequest;
use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Team $team, CreateCommentRequest $request)
    {
        $data = $request->validated();
        $data1 = ['team_id' => $team->id, 'user_id' => auth()->user()->id];
        Comment::create(array_merge($data, $data1));
        // $team->comments()->create($data);
        //auth()->user()->comments()->create($data);
        return redirect('/teams' . '/' . $team->id);
    }
}

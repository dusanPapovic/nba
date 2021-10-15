<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayerController extends Controller
{
    public function show(Player $player)
    {
        //  $player->load(['team']);
        return view('players.show', compact('player'));
    }
}

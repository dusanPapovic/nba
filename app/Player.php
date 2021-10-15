<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

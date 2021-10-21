<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'email', 'address', 'city'];

    public function players()
    {
        return $this->hasMany(Player::class); // svi modeli su dostupni u bilo kom modelu i ne mora da se inportuje(use)
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); // svi modeli su dostupni u bilo kom modelu i ne mora da se inportuje(use)
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_teams');
    }

}

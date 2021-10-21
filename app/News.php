<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title','content', 'user_id'];

    public static function getNews()
    {
        return self::with('user');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

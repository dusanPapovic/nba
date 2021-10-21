<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Team;

class NewsController extends Controller
{
    
    public function index()
    {

        // $news = News::getNews()->get();
        $news = News::with('user')->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        info($news);
        return view('news.show', compact('news'));
    }

    public function newsTeam($teamName)
    {

       //info($teamName);
       $team = Team::where('name', $teamName)->firstOrFail();
       // info($team);
       $news = $team->news()->paginate(2);
      // info($news);
        //$news =News::whereHas('teams',function($qb){$qb->whereIn('name',[$team->name]);});
        return view('news.news-team',compact('news'));
    }

}

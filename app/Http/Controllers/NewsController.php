<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Team;
use App\Http\Requests\CreateNewsRequest;

class NewsController extends Controller
{
    
    public function index()
    {
        
        // $news = News::getNews()->get();
        $news = News::with('user')->orderBy('created_at', 'desc')->paginate(10);

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

    public function create()
{
    $teams=Team::all();
    return view('news.create',compact('teams'));
}

public function store(CreateNewsRequest $request){

    $data = $request->validated();

    $newNews = auth()->user()->news()->create($data);
    $newNews->teams()->attach($data['teams']);
    // $newNews->teams()->sync($data['teams']);
    $request->session()->flash('status', 'Thank you for publishing article on www.nba.com');
    return redirect('/news');
}

}

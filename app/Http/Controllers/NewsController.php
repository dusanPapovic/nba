<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    
    public function index()
    {

        // $news = News::getNews()->get();
        $news = News::getNews()->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        
        $news->load(['user']);
        return view('news.show', compact('news'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use leagues;
use Table;
use DB;
use players;
use App\Team;
use Session;
use App\seasons;
use App\Venues;
use App\Article;
use App\matche;
use App\Http\Requests;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * $article=DB::table('articles')->orderBy('article_id','desc')->paginate(10);
    return view("news.index")
    ->with('Article' ,$article);
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Article=DB::table('articles')->orderBy('article_id','desc')->take(10)->get();
        $players= DB::table('players') ->paginate(15);
        $seasons= DB::table('seasons') ->get();
        $Table= DB::table('Table')->paginate(15);
        $matche= DB::table('matche_tables') ->paginate(15);
        $leagues= DB::table('leagues') ->get();
        return view('home')
         ->with('leagues',$leagues)
        ->withmatche($matche)
        ->with('seasons',$seasons)
            ->with('players', $players)
        ->with('Table', $Table)
            ->with('Article' ,$Article);
    }
}

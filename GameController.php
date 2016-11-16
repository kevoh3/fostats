<?php

namespace App\Http\Controllers;

use App\game;
use Illuminate\Http\Request;
use App\players;
use App\leagues;
use DB;
use App\Team;
use Session;
use App\seasons;
use App\Venues;
use App\matche;
use App\Http\Requests;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $players=players::all();
        $teams =Team::all();
        $Venues=Venues::all();
        $seasons=seasons::all();
        $leagues=leagues::all();
        return view('game.create')
            ->withleagues($leagues)
            ->withseasons($seasons)
            ->withvenue($Venues)
            ->withteams($teams)
            ->with('players', $players);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(

            "hteam"=>"required",
            "hscore" => "required",
            "ascore"=>"required",
            "ateam"=>"required",

        ));
        $game=new game();
        $game->hteam=$request->hteam;
        $game->hscore=$request->hscore;
        $game->ascore=$request->ascore;
        $game->ateam=$request->ateam;
        $game->hstarts=$request->hstarts;
        $game->hsubs=$request->hsubs;
        $game->astarts=$request->astarts;
        $game->asubs=$request->asubs;
        $game->status=$request->status;
        $game->save();
        $game->Team()->sync($request->hteam,false);
        $game->Team()->sync($request->ateam,false);
        $game->players()->sync($request->hstarts,false);
        $game->players()->sync($request->astarts,false);
        $game->players()->sync($request->hsubs,false);
        $game->players()->sync($request->asubs,false);
        Session::flash('success', 'the record was successfully updated');
        Session::flash('success', 'the record was successfully saved');
        return redirect()->route("game.show", $game->game_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($game_id)
    {
        $game=game::find($game_id);
        return view('game.show')
            ->with('game' ,$game);
    }

    /**
     * $game->Team()->sync($request->hteam,true);
    $game->Team()->sync($request->ateam,true);
    $game->players()->sync($request->hstarts,true);
    $game->players()->sync($request->astarts,true);
    $game->players()->sync($request->hsubs,true);
    $game->players()->sync($request->asubs,true);
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

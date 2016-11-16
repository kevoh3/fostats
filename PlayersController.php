<?php

namespace App\Http\Controllers;

use App\players;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players= DB::table('players') ->paginate(20);
        return view("players.index")
            ->with('players', $players);

        // compact('players'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players.create'); //
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
            "player" => "required",
            "gender"=>"required",
            "country"=>"required",
            "Appearance" => "required",
            "subs"=>"required",
            "goals"=>"required",
            "yellow"=>"required",
            "red"=>"required"

        ));
        $players=new players;
        $players->player=$request->player;
        $players->gender=$request->gender;
        $players->country=$request->country;
         $players->Appearance=$request->Appearance;
        $players->subs=$request->subs;
        $players->goals=$request->goals;
        $players->D_O_B=$request->D_O_B;
        $players-> yellow=$request->yellow;
        $players->red=$request->red;

        $players->save();
        Session::flash('success', 'the record was successfully saved');
        return redirect()->route("players.show",$players->player_id);  //
    }

    /** <th
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($player_id)
    {
        $players=players::find($player_id);
        return view('players.show')
            ->with('players' ,$players);//
    }

    /**
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

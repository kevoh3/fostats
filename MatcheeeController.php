<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\matches;
use App\Http\Requests;

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view("partials.matches"); //
        $matches= DB::table('matche_tables') ->get();
        return view("matches.index", compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matches.create'); //
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

            "start_time" => "required",
            "home_team"=>"required",
            "home_score" => "required",
            "away_score"=>"required",
            "away_team"=>"required"

        ));
        $matches=new matches;
        $matches->start_time=$request->start_time;
        $matches->home_team=$request->home_team;
        $matches->home_score=$request->home_score;
        $matches->away_score=$request->away_score;
        $matches->away_team=$request->away_team;

        $matches->save();
        Session::flash('success', 'the record was successfully saved');
        return redirect()->route("matches.show", $matches->id);//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matches=matches::find($id);
        return view('matches.show')
            ->with('matches' ,$matches);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matches= matches::find($id);
        return view('matches.edit')
            ->with('matches',$matches); //
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
        $this->validate($request, array(

            "start_time" => "required",
            "home_team"=>"required",
            "home_score" => "required",
            "away_score"=>"required",
            "away_team"=>"required"

        ));
        $matches = matches::find($id);
        $matches->start_time=$request->start_time;
        $matches->home_team=$request->home_team;
        $matches->home_score=$request->home_score;
        $matches->away_score=$request->away_score;
        $matches->away_team=$request->away_team;

        $matches->save();
        Session::flash('success', 'the record was successfully updated');
        return redirect()->route("matches.show", $matches->id);//  //
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

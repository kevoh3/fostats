<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\leagues;
use DB;
use App\Team;
use Session;
use App\seasons;
use App\Venues;
use App\matche;
use App\Http\Requests;
class MatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$matche=App\matche::all();

        $matche= DB::table('matche_tables') ->get();
        return view("matche.index", compact('matche'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Team=Team::all();
        $Venues=Venues::all();
        $seasons=seasons::all();
        $leagues=leagues::all();
        return view('matche.create')
            ->withleagues($leagues)
            ->withseasons($seasons)
            ->withvenue($Venues)
            ->withTeam($Team);

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
            "away_team"=>"required",
            "league_id"=>"required",
          "season_id"=>"required",
          "venue_id"=>"required",
          "status"=>"required"
        ));
        $matche=new matche;
        $matche->start_time=$request->start_time;
        $matche->home_team=$request->home_team;
        $matche->home_score=$request->home_score;
        $matche->away_score=$request->away_score;
        $matche->away_team=$request->away_team;
        $matche->league_id=$request->league_id;
        $matche->season_id=$request->season_id;;
       $matche->venue_id=$request->venue_id;
        $matche->status=$request->status;

       $matche->save();
        Session::flash('success', 'the record was successfully saved');
        return redirect()->route("matche.show", $matche->match_id);//
    }

    /** <td>{{ $data ->league_id}}</td>
    <td>{{ $data ->season_id}}</td>
    <td>{{ $data ->venue}}</td>
    <td>{{ $data ->status}}</td>
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($match_id)
    {
        $matche=matche::find($match_id);
        return view('matche.show')
            ->with('matche' ,$matche);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($match_id)
    {
        $matche =matche::find($match_id);
        return view('matche.show')
            ->with('match' ,$matche);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $match_id)
    {
        $this->validate($request, array(

            "start_time" => "required",
            "home_team"=>"required",
            "home_score" => "required",
            "away_score"=>"required",
            "away_team"=>"required"

        ));
        $matche = matches::find($match_id);
        $matche->start_time=$request->start_time;
        $matche->home_team=$request->home_team;
        $matche->home_score=$request->home_score;
        $matche->away_score=$request->away_score;
        $matche->away_team=$request->away_team;
        $matche->league_id=$request->league_id;
        $matche->season_id=$request->season_id;
        $matche->venue_id=$request->venue_id;
        $matche->status=$request->status;
        $matche->save();
        Session::flash('success', 'the record was successfully updated');
        return redirect()->route("matche.show", $matche->$match_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($match_id)
    {
        //
    }
}

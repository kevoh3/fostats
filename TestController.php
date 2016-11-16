<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\leagues;
use Illuminate\Http\Request;
use DB;
use App\Tim;
use App\players;
use App\Team;
use Session;
use App\seasons;
use App\Venues;
use App\matche;
use App\Http\Requests;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tims=DB::table('tims')->first();
        $players= DB::table('players')->get();
        $Team = DB::table('teams') ->get();
        $matche= DB::table('matche_tables') ->get();
        return view("test.index", compact('matche'))
            ->with('Team',$Team)
            ->with('players', $players)
        ->with('tms',$tims);

    }

    /**
     * return Event::with(['city.companies.persons' => function ($query) {
    $query->select('id', '...');
    }])->get();
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tim=Tim::all();
        $players=players::all();
        $teams =Team::all();
        $Venues=Venues::all();
        $seasons=seasons::all();
        $leagues=leagues::all();
        return view('test.create')
            ->withleagues($leagues)
            ->withseasons($seasons)
            ->withvenue($Venues)
            ->withteams($teams)
            ->withTim($tim)
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
               $matche->Team()->sync($request->teams,false);
               $matche->players()->sync($request->player,false);
        Session::flash('success', 'the record was successfully saved');
        return redirect()->route("test.show", $matche->match_id);//
    }

    /** <td>{
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($match_id)
    {

        $matche=matche::find($match_id);
        return view('test.show')
            ->with('matche' ,$matche);
            //->with(participant ,$participants);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($match_id)
    {
        $matche= matche::find($match_id);
        $players=players::all();
        $play=array();
        foreach ($players as $player){
            $play[$player->player_id]=$player->player;
        }
        $teams =Team::all();
        $tea=array();
        foreach ($teams as $team){
            $tea[$team->team_id]=$team->team;
    }
        $Venues=Venues::all();
        $ven=array();
        foreach ($Venues as $venue){
            $ven[$venue->venue_id]=$venue->venue;
        }
        $seasons=seasons::all();
        $seas=array();
        foreach ($seasons as $season){
            $seas[$season->season_id]=$season->season;
        }
        $leagues=leagues::all();
        $leag=array();
        foreach ($leagues as $league){
            $leag[$league->league_id]=$league->league;
        }

                return view('test.edit')
            ->with('matche',$matche)
            ->withvenue($ven)
                ->withleagues($leag)
                ->withseasons($seas)
             ->withteams($tea)
            ->withplayers($play);

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
        $matche = matche::find($match_id);
        $matche->start_time=$request->start_time;
        $matche->home_team=$request->home_team;
        $matche->home_score=$request->home_score;
        $matche->away_score=$request->away_score;
        $matche->away_team=$request->away_team;
        $matche->league_id=$request->league_id;
        $matche->season_id=$request->season_id;
        $matche->venue_id=$request->input('venue_id');
        $matche->status=$request->status;
        $matche->save();

        $matche->Team()->sync($request->teams,true);
        $matche->players()->sync($request->player,true);
        Session::flash('success', 'the record was successfully updated');
        return redirect()->route("test.show", $matche->match_id);
    }

    /**
     * if (isset($request->teams)){
    $matche->Team()->sync($request->teams,true);
    }
    else{
    $matche->Team()->sync(array());
    }
    if (isset($request->players)){
    $matche->players()->sync($request->player,true);
    }
    else{
    $matche->players()->sync(array());
    }
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($match_id)
    {

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Table;
use App\Team;
use App\Http\Requests;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::all();
        $seasons= DB::table('seasons') ->get();
        $Table= DB::table('Table')->paginate(10);
        $leagues= DB::table('leagues') ->get();
        return view("tables.index")
            ->with('leagues',$leagues)
            ->with('seasons',$seasons)
            ->with('Table', $Table)
            ->with('Team',$teams);

        //
    }

    /**
     *
    $Venues=Venues::all();
    $seasons=seasons::all();
    $leagues=leagues::all();
    return view('matche.create')
    ->withleagues($leagues)
    ->withseasons($seasons)
    ->withvenue($Venues)

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.create');//
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
                "position" => "required",
                "teams"=>"required",
                "game_played" => "required",
                "win"=>"required",
                "draw"=>"required",
                "loose"=>"required",
                "goal_for"=>"required",
                "goal_against"=>"required",
                "goal_difference"=>"required",
                "points" => "required"
            ));
            $Table=new Table;
            $Table->position=$request->position;
            $Table->teams=$request->teams;
            $Table->game_played=$request->game_played;
            $Table->win=$request->win;
            $Table->draw=$request->draw;
            $Table->loose=$request->loose;
            $Table-> goal_for=$request->goal_for;
            $Table->goal_against=$request->goal_against;
            $Table->goal_difference=$request->goal_difference;
            $Table->points=$request->points;
            $Table->league_id=$request->league_id;
            $Table->season_id=$request->season_id;
            $Table->save();
            Session::flash('success', 'the record was successfully saved');
            return redirect()->route("tables.show", $Table->table_id);
        }


    /**
     *
     *
     *  {
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($table_id)
    {
        $Table=Table::find($table_id);
        return view('tables.show')
            ->with('Table' , $Table);  //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($table_id)
    {
        $Table= leagues_table::find($table_id);
        return view('tables.edit')
            ->with('leagues_table' , $Table);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $table_id)
    {
        $this->validate($request, array(
            "position" => "required",
            "teams" => "required",
            "game_played" => "required",
            "win" => "required",
            "draw" => "required",
            "loose" => "required",
            "goal_for" => "required",
            "goal_against" => "required",
            "goal_difference" => "required",
            "points" => "required"
        ));
        $Table = leagues_table::find($table_id);
        $Table->position = $request->input("position");
        $Table->teams = $request->input("teams");
        $Table->game_played = $request->input("game_played");
        $Table->win= $request->input("win");
        $Table->draw = $request->input("draw");
        $Table->loose = $request->input("loose");
        $Table->goal_for = $request->input("goal_for");
        $Table->goal_against = $request->input("goal_against");
        $Table->goal_difference = $request->input("goal_difference");
        $Table->points = $request->input("points");
        $Table->save();
        Session::flash('success', 'this post was successfully updated.');
        return redirect()->route('tables.show', $Table->$table_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($table_id)
    {
        $Table=Table::find($table_id);
        $Table->delete();
        Session::flash('success','the  data have been successfully deleted');
        return redirect()->route('tables.index');//
    }
}

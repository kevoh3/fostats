<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Team;
use Session;


class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.


     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Team = DB::table('teams') ->get();
        return view("teams.index",compact('Team'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Team=Team::all();
        return view('teams.create',compact('Team'));


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
           "team"=>"required",
            "country_id"=>"required"
        ));
        $Team=new Team();
        $Team->team=$request->team;
        $Team->country_id=$request->country_id;
        $Team->save();
        Session::flash('success', 'the record was successfully saved');
        return redirect()->route("teams.show",  $Team->team_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($team_id)
    {
        $Team= Team::find($team_id);
        return view('teams.show')
            ->with('Team' , $Team);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($team_id)
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

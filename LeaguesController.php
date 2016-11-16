<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Table;
use App\matche;
class LeaguesController extends Controller
{
    /** $Table= DB::table('Table')->paginate(10);
    return view("tables.index")
    ->with('seasons',$seasons)
    ->with('Table', $Table);
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    $matche= DB::table('matche_tables') ->get();
    return view("matche.index", compact('matche'));*/
    public function index()
    {
       // $Table= DB::table('Table') ->get();
        $seasons= DB::table('seasons') ->get();
        $leagues= DB::table('leagues') ->get();
       $matche= DB::table('matche_tables') ->get();
        return view("partials.leagues" ,compact('matche'))
            ->with('leagues',$leagues)
            ->with('seasons',$seasons);
           // ->with('Table' , $Table);
        //->with('matche_tables',$matches);
        //

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

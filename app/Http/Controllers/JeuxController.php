<?php

namespace App\Http\Controllers;

use App\Jeux;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JeuxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gameLists = DB::table('jeux AS j')
            ->leftjoin('image AS i', 'j.image_id', '=', 'i.id')
            ->leftjoin('genre AS G', 'j.genre_id', '=', 'g.id')
            ->select('j.*','g.nom as genre', 'i.lien') 
            ->where('deleted_at', null)
            ->get();
        return view('jeux.index', compact('gameLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jeux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = DB::table('jeux AS j')
        ->leftjoin('image AS i', 'j.image_id', '=', 'i.id')
        ->leftjoin('genre AS G', 'j.genre_id', '=', 'g.id')
        ->leftJoin('pays AS P', 'j.nationalite_id', '=', 'P.id' )
        ->select('j.*','g.nom as genre', 'i.lien', 'P.nom_fr_fr') 
        ->where('j.id', $id)
        ->get();
        return view('jeux.details')->with(['game'=>$game]);
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
        Jeux::destroy($id);
        return redirect('/jeux');
    }
}

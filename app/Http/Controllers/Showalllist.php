<?php

namespace App\Http\Controllers;
use App\Models\Moneytrackerapp;
use Illuminate\Http\Request;

class Showalllist extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showalllists= Moneytrackerapp::where('user_id',auth()->user()->id)->get()->sortByDesc('created_at');
        $sumofexpenses = Moneytrackerapp::where('user_id',auth()->user()->id)->get()->sum('amount');
        $sumofgas = Moneytrackerapp::where('category','=','1')->where('user_id',auth()->user()->id)->get()->sum('amount');
        $sumoffood = Moneytrackerapp::where('category','=','2')->where('user_id',auth()->user()->id)->get()->sum('amount');
        $sumofbills = Moneytrackerapp::where('category','=','3')->where('user_id',auth()->user()->id)->get()->sum('amount');
        $sumofgroceries = Moneytrackerapp::where('category','=','4')->where('user_id',auth()->user()->id)->get()->sum('amount');
        return view('showalllist',compact('showalllists','sumofexpenses','sumofgas','sumoffood','sumofbills','sumofgroceries'));
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

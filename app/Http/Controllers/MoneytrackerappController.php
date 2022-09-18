<?php

namespace App\Http\Controllers;
use App\Models\Moneytrackerapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

use function PHPSTORM_META\map;

class MoneytrackerappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $moneytrackerapps= Moneytrackerapp::where('user_id',auth()->user()->id)->get()->sortByDesc('created_at');
        $sumofexpenses = Moneytrackerapp::where('user_id',auth()->user()->id)->get()->sum('amount');
        $sumofgas = Moneytrackerapp::where('category','=','1')->where('user_id',auth()->user()->id)->get()->sum('amount');
        $sumoffood = Moneytrackerapp::where('category','=','2')->where('user_id',auth()->user()->id)->get()->sum('amount');
        $sumofbills = Moneytrackerapp::where('category','=','3')->where('user_id',auth()->user()->id)->get()->sum('amount');
        $sumofgroceries = Moneytrackerapp::where('category','=','4')->where('user_id',auth()->user()->id)->get()->sum('amount');
        return view('index',compact('moneytrackerapps','sumofexpenses','sumofgas','sumoffood','sumofbills','sumofgroceries'));
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

        $data = $request->validate([
            'amount'=>'required|numeric|gt:0',
            'category'=>'required',
            'content'=>'required',
            'categorystring'=>'required',
            'user_id'=>'required|numeric|gt:0',
        ]);
        Moneytrackerapp::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moneytrackerapp  $moneytrackerapp
     * @return \Illuminate\Http\Response
     */
    public function show(Moneytrackerapp $moneytrackerapp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moneytrackerapp  $moneytrackerapp
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneytrackerapp $moneytrackerapp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moneytrackerapp  $moneytrackerapp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moneytrackerapp $moneytrackerapp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moneytrackerapp  $moneytrackerapp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneytrackerapp $moneytrackerapp)
    {
        //
        $moneytrackerapp->delete();
        return back();
    }
}

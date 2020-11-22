<?php

namespace App\Http\Controllers;

use App\Exports\JongerenExport;
use App\Jongeren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;
use voku\helper\ASCII;

class JongerenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $jongeren = Jongeren::all();

        // load the view and pass the sharks
        return View::make('jongeren.index')
            ->with('jongeren', $jongeren);
    }

    public function export()
    {
        return Excel::download(new JongerenExport(), 'Jongeren.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){

        return view('jongeren.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        //call model
        $jong = new Jongeren;
        //gets request from input name
        $jong->naam = $request->input('naam');
        $jong->geboortedatum = $request->input('geboortedatum');
        $jong->straat = $request->input('straat');
        $jong->postcode = $request->input('postcode');
        $jong->woonplaats = $request->input('woonplaats');
        //saves/inserts in db
        $jong->save();


        return redirect('/jongeren');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jongeren  $jongeren
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $jong = Jongeren::findOrFail($id);


        return view('jongeren.edit', compact('jong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jongeren  $jongeren
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Jongeren $jongeren){
        $jong= Jongeren::find($request->input('id'));

        $jong->naam = $request->input('naam');
        $jong->geboortedatum = $request->input('geboortedatum');
        $jong->straat = $request->input('straat');
        $jong->postcode = $request->input('postcode');
        $jong->woonplaats = $request->input('woonplaats');

        $jong->save();

        return redirect('/jongeren');
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Jongeren  $jongeren
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id, Request $request){

        $jong = Jongeren::find($id);
        $jong->delete();

        return redirect('/jongeren');

    }
}

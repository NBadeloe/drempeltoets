<?php

namespace App\Http\Controllers;

use App\Activiteiten;
use App\Exports\ActiviteitenExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ActiviteitenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $activiteiten= Activiteiten::all();

        return view('activiteiten.index')->with('activiteiten', $activiteiten);
    }
    public function export()
    {
        return Excel::download(new ActiviteitenExport(), 'Activiteiten.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('activiteiten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function store(Request $request)
    {
        $activiteit = new Activiteiten();
        $activiteit->omschrijving = $request->input('omschrijving');
        $activiteit->save();

        return redirect('/activiteiten');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $activiteit = Activiteiten::findOrFail($id);


        return view('Activiteiten.edit', compact('activiteit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $activiteit = Activiteiten::find($request->input('id'));

        $activiteit->omschrijving = $request->input('omschrijving');

        $activiteit->save();

        return redirect('/activiteiten');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $activiteit = Activiteiten::find($id);
        $activiteit->delete();

        return redirect('/activiteiten');
    }
}

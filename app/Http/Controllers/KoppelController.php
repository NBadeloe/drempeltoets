<?php

namespace App\Http\Controllers;

use App\Exports\KoppelExport;
use App\Koppel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class KoppelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $koppels = DB::table('koppel')
            ->join('jongeren', 'koppel.jongeren_id', '=','jongeren.id')
            ->join('activiteiten', 'koppel.activiteiten_id', '=','activiteiten.id' )
            ->select('koppel.koppel_id', 'activiteiten.omschrijving', 'jongeren.naam')
            ->orderBy('koppel.koppel_id', 'asc')

            ->get();

        // load the view and pass the sharks
        return View('koppel.index')
            ->with('koppels', $koppels);
    }

    public function export()
    {
        return Excel::download(new KoppelExport(), 'jongerenActiviteit.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $activiteiten= DB::table('activiteiten')
            ->select('omschrijving')
            ->get();

        $jongeren= DB::table('jongeren')
            ->select('naam')
            ->get();

        return view('koppel.create',compact('activiteiten', $activiteiten,'jongeren', $jongeren));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jongeren= $request->jongeren;
        $jong = DB::table('jongeren')
            ->where('naam', '=', $jongeren)
            ->select('id')
            ->get();
        $jong_id = json_decode($jong[0]->{"id"});


        $activiteiten = $request->activiteiten;
        $activiteit = DB::table('activiteiten')
            ->where('omschrijving', '=', $activiteiten)
            ->select('id')
            ->get();
        $activiteit_id = json_decode($activiteit[0]->{"id"});

        DB::table('koppel')
            ->insert(['activiteiten_id' => $activiteit_id, 'jongeren_id' => $jong_id, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]);
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

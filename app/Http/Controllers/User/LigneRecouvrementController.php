<?php

namespace App\Http\Controllers\User;

use App\Models\Recouvrement;
use Illuminate\Http\Request;
use App\Models\LigneRecouvrement;
use App\Http\Controllers\Controller;

class LigneRecouvrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lignerecouvrements = LigneRecouvrement::all();
        $recouvrements = Recouvrement::all();

        return view('user.ligneRecouvrement.create', compact('lignerecouvrements', 'recouvrements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recouvrements = Recouvrement::all();
        $lignerecouvrements = LigneRecouvrement::all();
        // $fonctions = auth()->user()->antenne->etudiants()->get();

        return view( 'user.ligneRecouvrement.create',[
            'recouvrements' => $recouvrements,
            'lignerecouvrements' => $lignerecouvrements
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ligneRecouvrement = $request->validate([
            'lrecouv_num' => ['required','string','max:50'],
            'lrecouv_lib' => ['required','string','max:200'],
            'lrecouv_mont' => ['required','integer'],
            'lrecouv_qte' => ['required','integer'],
            'lrecouv_stat_code' => ['required','string','max:5'],
            'recouvrement_id' => ['required','integer']
        ]);

        LigneRecouvrement::create($ligneRecouvrement);

        return back()->with('toast_success', 'Ligne de recouvrement enregistrée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LigneRecouvrement  $ligneRecouvrement
     * @return \Illuminate\Http\Response
     */
    public function show(LigneRecouvrement $ligneRecouvrement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LigneRecouvrement  $ligneRecouvrement
     * @return \Illuminate\Http\Response
     */
    public function edit(LigneRecouvrement $ligneRecouvrement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LigneRecouvrement  $ligneRecouvrement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LigneRecouvrement $ligneRecouvrement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LigneRecouvrement  $ligneRecouvrement
     * @return \Illuminate\Http\Response
     */
    public function destroy(LigneRecouvrement $ligneRecouvrement)
    {
        //
    }
}

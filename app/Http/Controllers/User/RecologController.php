<?php

namespace App\Http\Controllers\User;

use App\Models\Antenne;
use App\Models\Recolog;
use App\Models\Exercice;
use App\Models\Fonction;
use Illuminate\Http\Request;
use App\Models\LigneRecouvrement;
use App\Http\Controllers\Controller;

class RecologController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctions = Fonction::all();
        $recologs = Recolog::all();
        $ligne_recouvrements = LigneRecouvrement::all();
        
        return view('user.recologs.create', compact('fonctions', 'ligne_recouvrements', 'recologs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recologs = Recolog::all();
        $fonctions = auth()->user()->antenne->etudiants()->get();
        $ligne_recouvrements = LigneRecouvrement::all();

        return view( 'user.recologs.create',[
            'fonctions' => $fonctions,
            'recologs' => $recologs,
            'ligne_recouvrements' => $ligne_recouvrements
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
        $recolog = $request->validate([
            'reco_date' => ['required', 'date'],
            'reco_stat_code' => ['required', 'string', 'max:5'],
            'fonction_id' => ['required','integer'],
            'ligne_recouvrement_id' => ['required','integer']
        ]);

        Recolog::create($recolog);

        return back()->with('toast_success', 'Recolog enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recolog  $recolog
     * @return \Illuminate\Http\Response
     */
    public function show(Recolog $recolog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recolog  $recolog
     * @return \Illuminate\Http\Response
     */
    public function edit(Recolog $recolog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recolog  $recolog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recolog $recolog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recolog  $recolog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recolog $recolog)
    {
        //
    }
}

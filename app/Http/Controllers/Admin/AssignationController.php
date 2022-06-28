<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Fonction;
use App\Models\Assignation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignations = Assignation::all();
        $operateurs = User::all();
        $fonctions = Fonction::all();

        return view('admin.assignations.index',compact('assignations','operateurs','fonctions'));
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
        $assignation = $request->validate([
            'user_id' => ['required','integer'],
            'fonction_id' => ['required','integer'],
            'date_debut' => ['required','date'],
            'date_fin' => ['required','date'],
        ]);

        Assignation::create($assignation);
        
        return back()->with('success', 'Assignation bien éffectuée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignation  $assignation
     * @return \Illuminate\Http\Response
     */
    public function show(Assignation $assignation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignation  $assignation
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignation $assignation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignation  $assignation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignation $assignation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignation  $assignation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignation $assignation)
    {
        //
    }
}

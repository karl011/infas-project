<?php

namespace App\Http\Controllers\User;

use App\Models\Banque;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\Ordrepaiement;
use App\Http\Controllers\Controller;

class BanqueController extends Controller
{
    public function index()
    {
        $banques = Banque::all();
        $fournisseurs = Fournisseur::all();
        $ordrepaiements = Ordrepaiement::all();

        return view('user.banques.index', compact('banques', 'fournisseurs', 'ordrepaiements'));
    }

    public function create()
    {
        $banques = Banque::all();
        $fournisseurs = Fournisseur::all();
        $ordrepaiements = Ordrepaiement::all();

        return view('user.banques.create', [
            'banques' => $banques,
            'fournisseurs' => $fournisseurs,
            'ordrepaiements' => $ordrepaiements
        ]);
    }

    public function store(Request $request)
    {
        $banques = $request->validate([
            'ban_code' => ['required', 'string', 'max:10'],
            'ban_design' => ['required', 'string', 'max:50'],
            'ban_guichet' => ['required', 'string', 'max:50'],
            'ban_compte' => ['required', 'string', 'max:20'],
            'ban_desc' => ['required', 'string', 'max:255']
        ]);

        Banque::create($banques);

        return back()->with('info', 'Banque enregistrée avec succès');
    }

    public function show(Banque $banque)
    {
        //
    }

    public function edit(Banque $banque)
    {
        //
    }

    public function update(Request $request, Banque $banque)
    {
        //
    }

    public function destroy(Banque $banque)
    {
        //
    }
}

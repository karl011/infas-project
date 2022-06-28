<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Antenne;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class OperateurController extends Controller
{
    public function index()
    {
        $users = User::all();

        $antennes = Antenne::all();

        return view('admin.operateurs.index', compact('users', 'antennes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $data =  $request->validate([
                'oper_code' => ['required', 'string', 'max:255'],
                'oper_nom' => ['required', 'string', 'min:4', 'max:200'],
                'oper_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'oper_statut' => ['required', 'string', 'min:4'],
                'oper_login' => ['required', 'string', 'min:5'],
                'oper_pwd' => ['required', 'string', 'min:8'],
                'antenne_id' => ['required'],
            ]);

            User::create([
                'oper_code' => $data['oper_code'],
                'oper_nom' => $data['oper_nom'],
                'oper_email' => $data['oper_email'],
                'oper_statut' => $data['oper_statut'],
                'oper_login' => $data['oper_login'],
                'oper_pwd' => Hash::make($data['oper_pwd']),
                'antenne_id' => $data['antenne_id'],
                'remember_token' => Str::random(10),
            ]);
        } catch (\Throwable $th) {
            return back()->with('toast_error', 'Désolé une erreur est survenue, veuillez revoir les informarions saisies.');
        }

        return back()->with('toast_success', 'Opérateur crée avec succès');
    }

    public function edit($user)
    {
        $users = User::where('id', '=', $user)->get()->first();
        return view('admin.operateurs.edit', compact('users'));
    }

    public function update(Request $request, $user)
    {
        try {
            $users = User::find($user);
            $users->oper_nom = $request->oper_nom;
            $users->oper_login =  $request->oper_login;
            $users->oper_pwd = $request->oper_pwd;
        } catch (\Throwable $th) {
            return redirect()->route('operateurs.index')->with('toast_error', 'Désolé il y a une erreur veuillez constactez l\'administrateur.');
        }

        $users->save();

        return redirect()->route('operateurs.index')->with('toast_success', 'Le mot de passe a été modifié.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('toast_success', 'Opérateur bien supprimer');
    }

    public function show(User $user)
    {
        //
    }
}

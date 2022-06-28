<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('user.types.index', compact('types'));
    }

    public function create()
    {
        $types = Type::all();
        return view('user.types.index', ['types' => $types]);
    }

    public function store(Request $request)
    {
        $types = $request->validate([
            'lib_type' => ['required', 'string', 'max:255'],
            'montant_ins' => ['required', 'integer'],
            'montant_scol' => ['required', 'integer'],
            'montant_bourse' => ['required', 'integer'],
        ]);
        $types = Type::create($types);
        return back()->with('info', 'Type étudiant enrégistré');
    }

    public function show(Type $type)
    {
        //
    }

    public function edit($type)
    {
        $types = Type::where('id', '=', $type)->get()->first();
        return view('user.types.edit', compact('types'));
    }

    public function update(Request $request, $type)
    {
        $types = Type::find($type);
        $types->lib_type = $request->lib_type;
        $types->montant_ins = $request->montant_ins;
        $types->montant_scol = $request->montant_scol;
        $types->montant_bourse = $request->montant_bourse;
        $types->save();

        return redirect()->route('types.index')->with('info', 'Les données sont modifiées');
    }

    public function destroy(Type $type)
    {
        //
    }
}

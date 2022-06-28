<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            return view('admin.home');
        }
        return view('user.home');
    }

    protected function eloquentORM()
    {
        //recupere tout les utilisateurs qui ont des articles publiés 
        User::whereHas('articles', function($query){
            $query->where('published',true);
        })->get();

        //recupere tout les utilisateurs avec leurs articles associés
        User::with('articles')->get();

        //recupere tout les utilisateurs avec leurs articles et leurs roles associés
        User::with('articles','roles')->get();

        //recupere tout les utilisateurs avec leurs articles et leurs commentaires associés
        User::with('articles.comments')->get();
    }
}

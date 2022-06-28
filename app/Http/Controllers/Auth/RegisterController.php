<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Antenne;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest');
    }*/

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $antennes = Antenne::all();

        return view('auth.register', compact('antennes'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'oper_code' => ['required', 'string', 'max:255'],
            'oper_nom' => ['required', 'string', 'min:4', 'max:200'],
            'oper_email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'oper_statut' => ['required', 'string', 'min:4'],
            'oper_login' => ['required', 'string', 'min:5'],
            'oper_pwd' => ['required', 'string', 'min:8'],
            'antenne_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'oper_code' => $data['oper_code'],
            'oper_nom' => $data['oper_nom'],
            'oper_email' => $data['oper_email'],
            'oper_statut' => $data['oper_statut'],
            'oper_login' => $data['oper_login'],
            'oper_pwd' => Hash::make($data['oper_pwd']),
            'antenne_id' => $data['antenne_id'],
        ]);
    }
}

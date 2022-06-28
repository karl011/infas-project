<?php

namespace Database\Seeders;

use App\Models\Antenne;
use App\Models\Fonction;
use App\Models\Assignation;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Antenne::create([
            'ant_code' => 'ABJ',
            'ant_lib' => 'Abidjan',
            'ant_statut' => 'O'
        ]);
        Fonction::create([
            'fonc_code' => 'ADM',
            'fonc_lib' => 'Administrateur',
            'fonc_statut' => 'O'
        ]);

        User::create([
            'oper_code' => 'Oper001',
            'oper_nom' => 'Administrateur',
            'oper_login' => 'Admin',
            'oper_pwd' => Hash::make('00000000'),
            'oper_sexe' => 'M',
            'oper_statut' => 'actif',
            'oper_email' => 'infas@gmail.com',
            'antenne_id' => 1
        ]);

        Assignation::create([
            'user_id' => 1,
            'fonction_id' => 1,
            'date_debut' => date('Y-m-j'),
            'date_fin' => date('Y-m-j')
        ]);
    }
}

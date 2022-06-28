<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Exercice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reglement extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_date',
        'reg_mont',
        'reg_mrg_code',
        'reg_numREG',
        'reg_retenu',
        'reg_op_num',
        'type_acteur',
        'reg_stat_code',
        'antenne_id',
        'exercice_id',
        'user_id',
        'etudiant_id',
        'vacataire_id',
        'founisseur_id'
    ];

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function vacataires()
    {
        return $this->hasMany(Vacataire::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
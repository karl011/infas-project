<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Exercice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scolarite extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_scol',
        'montant_scol',
        'montant_vers',
        'montant_rest',
        'etudiant_id',
        'exercice_id',
        'antenne_id',
        'statut_scol',
    ];

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}

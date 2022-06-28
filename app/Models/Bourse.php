<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bourse extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'code',
        // 'montant',
        // 'etudiant_id',
        'libelle',
        'statut',
        'antenne_id',
        'ordrepaiement_id'
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function antennes()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function ordrepaiement()
    {
        return $this->belongsTo(Ordrepaiement::class);
    }
}

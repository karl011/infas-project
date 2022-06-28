<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_vac',
        'mont_vac',
        'vacataire_id',
        'antenne_id',
        'exercice_id',
        'statut',
    ];

    public function vacataire()
    {
        return $this->belongsTo(Vacataire::class);
    }

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }
}

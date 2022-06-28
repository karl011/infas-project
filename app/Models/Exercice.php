<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercice extends Model
{
    use HasFactory;

    protected $fillable = [
        'exe_code',
        'exe_statut'
    ];

    public function ordrepaiement()
    {
        return $this->belongsTo(Ordrepaiement::class);
    }
    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }
}

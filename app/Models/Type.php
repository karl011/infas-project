<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'lib_type',
        'montant_ins',
        'montant_scol',
        'montant_bourse',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}

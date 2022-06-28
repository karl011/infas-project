<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etubanque extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_banque',
        'numero_cpte_banque',
        'etudiant_id',
        'banque_id'
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function banque()
    {
        return $this->belongsTo(Banque::class);
    }
}

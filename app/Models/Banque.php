<?php

namespace App\Models;

use App\Models\Fournisseur;
use App\Models\Ordrepaiement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banque extends Model
{
    use HasFactory;

    protected $fillable = [
        'ban_code',
        'ban_design',
        'ban_guichet',
        'ban_compte',
        'ban_desc',
    ];

    public function fournisseur()
    {
        return $this->hasMany(Fournisseur::class);
    }

    public function ordrepaiement()
    {
        return $this->hasMany(Ordrepaiement::class);
    }

    public function etubanque()
    {
        return $this->hasMany(Etubanque::class);
    }
}

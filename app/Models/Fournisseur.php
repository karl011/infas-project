<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Recette;
use App\Models\Ordrepaiement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_four',
        'nom_four',
        'adresse_four',
        'rib_four',
        'compte_four',
        'tel_four',
        'antenne_id',
        'banque_id'
    ];

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }
    public function ordrepaiement()
    {
        return $this->belongsTo(Ordrepaiement::class);
    }
    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }

    public function banque()
    {
        return $this->belongsTo(Banque::class);
    }

    public function detailop()
    {
        return $this->hasMany(Detailop::class);
    }

    public function detailrecette()
    {
        return $this->hasMany(Detailrecette::class);
    }

    public function reglements()
    {
        return $this->hasMany(Reglement::class);
    }
}

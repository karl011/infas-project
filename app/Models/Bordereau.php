<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Recette;
use App\Models\Ordrepaiement;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bordereau extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_bord',
        'type_bord',
        'direction_bord',
        'date_trans_bord',
        'categorie_bord',
        'montant_bord',
        'statut_bord',
        'user_id',
        'antenne_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function ordrepaiements()
    {
        return $this->hasMany(Ordrepaiement::class);
    }

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }
}

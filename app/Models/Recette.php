<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Exercice;
use App\Models\Fonction;
use App\Models\Bordereau;
use App\Models\Fournisseur;
use App\Models\Detailrecette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recette extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre_num',
        'mont_titre',
        'date_emission',
        'type_titre',
        'objet',
        'lire_code',
        'num_declar',
        'date_saisie',
        'date_pec',
        'date_diff',
        'date_rej',
        'bord_numR',
        // 'titre_fonc_code_pec',
        // 'titre_fonc_code_rejet',
        'titre_num_annule',
        'statut',
        'gest_code',
        'motif_diff',
        'motif_rej',
        'cpte_code',
        'fournisseur_id',
        'exercice_id',
        'user_id',//ou fonction
        'bordereau_id',
        'antenne_id'
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bordereau()
    {
        return $this->belongsTo(Bordereau::class);
    }

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function detailrecette()
    {
        return $this->hasMany(Detailrecette::class);
    }
}

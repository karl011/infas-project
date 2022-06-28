<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Recette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detailrecette extends Model
{
    use HasFactory;
    protected $fillable = [
        'drec_num',
        'drec_benef',
        'drec_mont',
        'drec_objet',
        'drec_bqe',
        'drec_num_cpte',
        'drec_type',
        'date_reg_drec',
        'mont_net_drec',
        'drec_motif_diff',
        'drec_motif_rej',
        'drec_statut',
        'recette_id',
        'antenne_id',
        'etudiant_id',
        'vacataire_id',
        'fournisseur_id'
    ];

    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function etudiants()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function vacataires()
    {
        return $this->belongsTo(Vacataire::class);
    }

    public function fournisseurs()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}

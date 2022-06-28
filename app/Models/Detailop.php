<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Ordrepaiement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detailop extends Model
{
    use HasFactory;

    protected $fillable = [
        'dop_num',
        'dop_benef',
        'dop_mont',
        'dop_objet',
        'dop_bqe_code',
        'num_cpte',
        'dop_type',
        'date_reg',
        'mont_net',
        'dop_motif_diff',
        'dop_motif_rej',
        'dop_statut',
        'ordrepaiement_id',
        'antenne_id',
        'etudiant_id',
        'vacataire_id',
        'fournisseur_id',
    ];

    public function ordrepaiement()
    {
        return $this->belongsTo(Ordrepaiement::class);
    }

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function vacataire()
    {
        return $this->belongsTo(Vacataire::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}

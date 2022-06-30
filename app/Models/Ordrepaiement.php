<?php

namespace App\Models;

use App\Models\Banque;
use App\Models\Antenne;
use App\Models\Detailop;
use App\Models\Exercice;
use App\Models\Bordereau;
use App\Models\Fournisseur;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ordrepaiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_ordre',
        'date_op',
        'mont_ordre',
        'numero_cpte',
        'numero_liq',
        'objet',
        'mrg_code',
        'cpte_ordre',
        'date_saisie',
        'statut',
        'date_pec',
        'date_rej',
        'date_emission',
        'date_val_sgc',
        'date_val_cds',
        'date_ordre',
        'mont_net_ordre',
        'motif_diff',
        'motif_rej',
        'ordre_bord_numR',
        'fonc_code_pec',
        'ordre_num_annule',
        'plc_gst',
        'cpte_pec',
        'user_id',
        // 'fournisseur_id',
        'exercice_id',
        'bordereau_id',
        'antenne_id',
        'banque_id'
    ];

    // public function fournisseur()
    // {
    //     return $this->belongsTo(Fournisseur::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }

    public function bordereau()
    {
        return $this->belongsTo(Bordereau::class);
    }

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }

    public function detailops()
    {
        return $this->hasMany(Detailop::class);
    }

    public function banque()
    {
        return $this->belongsTo(Banque::class);
    }

    public function bourses()
    {
        return $this->hasMany(Bourse::class);
    }
}

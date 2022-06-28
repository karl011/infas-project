<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Exercice;
use App\Models\Fonction;
use App\Models\Inscription;
use App\Models\LigneRecouvrement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recouvrement extends Model
{
    use HasFactory;

    protected $fillable = [
        'recouv_date',
        //'recouv_date_entr',
        // 'recouv_num_bord_vert',
        // 'recouv_cpb_code',
        //'recouv_num',
        'recouv_mont',
        'recouv_mrg_code',
        'recouv_numBCV',
        'recouv_op_num',
        'recouv_stat_code',
        'recouv_fourn_code',
        'recouv_etex_mat',
        'recouv_vacex_mat',
        'user_id',
        'antenne_id',
        'exercice_id',
        // 'inscription_id'
    ];

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function exercice()
    {
        return $this->belongsTo(Exercice::class);
    }
    // public function inscription()
    // {
    //     return $this->belongsTo(Inscription::class);
    // }
}

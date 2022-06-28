<?php

namespace App\Models;

use App\Models\Fonction;
use App\Models\LigneRecouvrement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recolog extends Model
{
    use HasFactory;

    protected $fillable = [
        'reco_date',
        'reco_stat_code',
        'fonction_id',
        'ligne_recouvrement_id'
    ];

    public function fonction()
    {
        return $this->belongsTo(Fonction::class);
    }

    public function ligne_recouvrement()
    {
        return $this->hasMany(LigneRecouvrement::class);
    }
}
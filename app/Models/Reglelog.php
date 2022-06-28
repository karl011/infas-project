<?php

namespace App\Models;

use App\Models\Fonction;
use App\Models\LigneReglement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reglelog extends Model
{
    use HasFactory;

    protected $fillable =[
        'relog_date',
        'relog_stat_code',
        'fonction_id',
        'ligne_reglement_id'
    ];

    public function fonction ()
    {
        return $this->belongsTo(Fonction::class);
    }
    
    public function ligne_reglement()
    {
        return $this->hasMany(LigneReglement::class);
    }
}

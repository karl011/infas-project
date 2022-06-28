<?php

namespace App\Models;

use App\Models\Reglement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneReglement extends Model
{
    use HasFactory;

    protected $fillable = [
        'lreg_num',
        'lreg_lib',
        'lreg_mont',
        'lreg_qte',
        'lreg_stat_code',
        'reglement_id'
    ];

    public function reglement()
    {
        return $this->belongsTo(Reglement::class);
    }
}

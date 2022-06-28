<?php

namespace App\Models;

use App\Models\Recouvrement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneRecouvrement extends Model
{
    use HasFactory;

    protected $fillable = [
        'lrecouv_num',
        'lrecouv_lib',
        'lrecouv_mont',
        'lrecouv_qte',
        'lrecouv_stat_code',
        'recouvrement_id'
    ];

    public function recouvrement()
    {
        return $this->belongsTo(Recouvrement::class);
    }
}

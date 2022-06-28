<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'sect_code',
        'sect_lib',
        'sect_statut',
        'formation_id'
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}

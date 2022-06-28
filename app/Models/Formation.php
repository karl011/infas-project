<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_code',
        'form_lib',
        'form_statut',
        'antenne_id',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}

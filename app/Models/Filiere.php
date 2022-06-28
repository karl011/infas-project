<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'fil_code',
        'fil_lib',
        'fil_statut',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}

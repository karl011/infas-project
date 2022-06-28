<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Exercice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
  use HasFactory;

  protected $fillable = [
    'date_insc',
    'mont_insc',
    'mont_scol',
    'mont_bour',
    'scol_verse',
    'niveau_etud',
    'cas_special',
    'etudiant_id',
    'filiere_id',
    'exercice_id',
    'antenne_id',
    'statut',
  ];

  public function antenne()
  {
    return $this->belongsTo(Antenne::class);
  }

  public function etudiant()
  {
    return $this->belongsTo(Etudiant::class);
  }

  public function exercice()
  {
    return $this->belongsTo(Exercice::class);
  }

  public function filiere()
  {
    return $this->belongsTo(Filiere::class);
  }
}

<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Bourse;
use App\Models\Antenne;
use App\Models\Detailop;
use App\Models\Reglement;
use App\Models\Scolarite;
use App\Models\Inscription;
use App\Models\Detailrecette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
  use HasFactory;

  protected $fillable = [
    'nom',
    'prenoms',
    'naissance',
    'lieu',
    'matricule_etd',
    'phone',
    'rib',
    'nationalite',
    'sexe',
    'email',
    'boursier',
    'statut',
    'antenne_id',
    'type_id',
  ];

  public function antenne()
  {
    return $this->belongsTo(Antenne::class);
  }

  public function inscription()
  {
    return $this->hasOne(Inscription::class);
  }

  public function scolarites()
  {
    return $this->hasMany(Scolarite::class);
  }
  public function bourses()
  {
    return $this->hasMany(Bourse::class);
  }

  public function detailop()
  {
    return $this->hasMany(Detailop::class);
  }

  public function detailrecette()
  {
    return $this->hasMany(Detailrecette::class);
  }

  public function reglement()
  {
    return $this->belongsTo(Reglement::class);
  }
  public function type()
  {
    return $this->belongsTo(Type::class);
  }

  public function etubanque()
  {
    return $this->belongsTo(Etubanque::class);
  }
}

<?php

namespace App\Models;

use App\Models\Antenne;
use App\Models\Detailop;
use App\Models\Detailrecette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacataire extends Model
{
  use HasFactory;

  protected $fillable = [
    // 'matricule_vac',
    'nom',
    'prenoms',
    'date_naiss',
    'phone_1',
    'rib',
    'sexe',
    'email',
    'type',
    'statut',
    'antenne_id',
  ];

  public function antenne()
  {
    return $this->belongsTo(Antenne::class);
  }

  public function detailops()
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
}

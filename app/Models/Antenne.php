<?php

namespace App\Models;

use App\Models\User;
use App\Models\Bourse;
use App\Models\Etudiant;
use App\Models\Formation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Antenne extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'ant_code',
    'ant_lib',
    'ant_statut',
  ];

  public function users()
  {
    return $this->hasMany(User::class);
  }

  public function formations()
  {
    return $this->hasMany(Formation::class);
  }

  public function etudiants()
  {
    return $this->hasMany(Etudiant::class);
  }
  public function bourses()
  {
    return $this->hasMany(Bourse::class);
  }

  public function bordereaus()
  {
    return $this->hasMany(Bordereau::class);
  }

  public function fournisseur()
  {
    return $this->hasMany(Fournisseur::class);
  }

  public function ordrepaiement()
  {
    return $this->belongsTo(Ordrepaiement::class);
  }

  public function recette()
  {
    return $this->belongsTo(Recette::class);
  }

  public function detailop()
  {
    return $this->belongsTo(Detailop::class);
  }

  public function detailrecette()
  {
    return $this->belongsTo(Detailrecette::class);
  }
}

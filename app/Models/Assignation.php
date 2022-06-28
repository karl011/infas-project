<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'user_id',
        'fonction_id',
      ];
  
      public function user()
      {
        return $this->belongsTo("App\Models\User");
      }
  
      public function fonction()
      {
        return $this->belongsTo("App\Models\Fonction");
      }
  
      public function getActiveAttribute()
      {
        return $this->date_debut <= date("Y-m-d") && $this->date_fin >= date('Y-m-d');
      }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fonc_code',
        'fonc_lib',
        'fonc_statut',
    ];

    public function users()
    {
      return $this->belongsToMany(User::class, 'assignations')->withPivot('date_debut', 'date_fin');
    }

    public function bordereau()
    {
      return $this->belongsTo(Bordereau::class);
    }
}

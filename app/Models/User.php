<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //protected $primaryKey = 'oper_pk';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'oper_code',
        'oper_nom',
        'oper_sexe',
        'oper_email',
        'oper_login',
        'oper_pwd',
        'oper_statut',
        'antenne_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'oper_pwd',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->oper_pwd;
    }

    public function fonctions()
    {
      return $this->belongsToMany(Fonction::class, 'assignations')->withPivot('date_debut', 'date_fin');
    }

    public function hasFonction($fonction)
    {
        return $this->fonctions()->where('fonc_code',$fonction)->first() !== null;
    }

    public function hasAnyFonction($fonctions)
    {
        return $this->fonctions()->where('fonc_code',$fonctions)->first() !== null;
    }

    public function antenne()
    {
        return $this->belongsTo(Antenne::class);
    }
    
    public function reglement()
    {
        return $this->belongsTo(Reglement::class);
    }
    public function recouvrement()
    {
        return $this->hasMany(Recouvrement::class);
    }

}

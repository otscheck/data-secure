<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom_complet',
        'region_id',
        'poste_id',
        'adresse',
        'quartier',
        'telephone',
        'prime',
        'engage_le',
        'depart_le',
        'taille',
        'sexe',
        'description'
    ];

    /////////////// Relation ////////////////////////////////////////    
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function poste()
    {
        return $this->belongsTo(Poste::class);
    }

    public function site()
    {
        return $this->hasMany(Site::class);
    }

    /////////////fin relation ///////////////////////////////


    ///////////////////  changement format date   
    public function getEngageLeAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['engage_le'])->format('d-m-Y');
    }

    public function getDepartLeAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['depart_le'])->format('d-m-Y');
    }

    // public function getDateDebutContratAttribute()
    // {
    //     return Carbon::createFromFormat('Y-m-d', $this->attributes['date_debut_contrat'])->format('d/m/Y');
    // }

    /////////////////////////////////


}

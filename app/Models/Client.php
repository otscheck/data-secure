<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_contrat',
        'nom_complet',
        'adresse',
        'date_debut_contrat',
        'nom_contact',
        'tel_contact',
        'dernier_mois_paye',
        'description'
    ];
}

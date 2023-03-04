<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DateTimeInterface;

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

    public function getDateDebutContratAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['date_debut_contrat'])->format('d/m/Y');
    }
}

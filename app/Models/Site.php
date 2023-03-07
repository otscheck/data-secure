<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'client_id',
        'region_id',
        'adresse',
        'quartier',
        'employee_id',
        'tag_id',
        'ouvert_le',
        'derniere_visite',
        'ferme_le',
        'nb_agent_factures',
        'nb_agent_deployes',
        'nb_alarme',
        'nb_chien',
        'prix_agent',
        'prix_chien',
        'prix_alarme',
        'description',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    ///////////////////////////////
    public function getOuvertLeAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['ouvert_le'])->format('d-m-Y');
    }

    public function getFermeLeAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['ferme_le'])->format('d-m-Y');
    }

    public function getDerniereVisiteAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['derniere_visite'])->format('d-m-Y');
    }

    /////////////////////////////////////////////////////
}

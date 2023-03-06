<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;

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

    public function getDerniereVisiteAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['derniere_visite'])->format('d-m-Y');
    }
}

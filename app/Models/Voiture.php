<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable =['marque_id', 'modele_id', 'tcarburant_id', 'etat_id' ,'matricule','ncg','image','status'];

    public function marque(){
        return $this->belongsTo(Marque::class);
    }
    public function modele(){
        return $this->belongsTo(Modele::class);
    }
    public function tcarburant(){
        return $this->belongsTo(Tcarburant::class);
    }
    public function etat(){
        return $this->belongsTo(Etat::class);
    }
    public function reservations(){
        return $this->HasMany(Reservation::class);
    }
    public function getRouteKeyName()
    {
        return "id";
    }
}

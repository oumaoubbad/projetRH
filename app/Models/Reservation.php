<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' , 'voiture_id' ,'date_debut' ,'date_fin','direction','region','description', 'status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function voiture(){
        return $this->hasMany(Voiture::class);
    }

}

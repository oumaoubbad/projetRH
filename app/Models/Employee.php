<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable =['nom', 'prenom', 'email', 'adr' ,'tel','CIN', 'num_permis' ,'fonction_id'];

    public function fonction(){
        return $this->belongsTo(Fonction::class);
    }
    
}

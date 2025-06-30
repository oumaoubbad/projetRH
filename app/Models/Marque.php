<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',  'image'
    ];
    public function voirures(){
        return $this->HasMany(Voiture::class);
    }
  
}

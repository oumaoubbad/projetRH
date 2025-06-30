<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'  ,'date' ,'objet','prix','description'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

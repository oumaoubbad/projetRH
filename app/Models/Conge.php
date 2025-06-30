<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'  ,'date_debut' ,'date_fin','raison','status','description'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function scopeApproved($query)
    {
        return $query->where('is_approved',true);
    }

}

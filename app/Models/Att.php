<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Att extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'  ,'type','status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function scopeApproved($query)
    {
        return $query->where('is_approved',true);
    }
}

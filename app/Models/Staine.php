<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staine extends Model
{
    use HasFactory;
    protected $fillable =['titre','time_in', 'user_id', 'time_out'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

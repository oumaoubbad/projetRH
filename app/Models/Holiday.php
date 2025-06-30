<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $dates = ['created_at', 'updated_at', 'start_date', 'end_date'];
    protected $fillable = ['name', 'start_date', 'end_date'];
}

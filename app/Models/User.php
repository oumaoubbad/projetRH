<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'picture' ,'email','role', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function Conges(){
        return $this->hasMany(Conge::class);
    }
   
    public function Staines(){
        return $this->hasMany(Staine::class);
    }
    public function Attestations(){
        return $this->hasMany(Staine::class);
    }
    public function Atts(){
        return $this->hasMany(Att::class);
    }
    public function Factures(){
        return $this->hasMany(Facture::class);
    }
    public function Autorisations(){
        return $this->hasMany(Autorisation::class);
    }
}

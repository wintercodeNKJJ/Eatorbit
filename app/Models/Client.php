<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Authenticatable
{
    use HasFactory;

    
    protected $guarded = [];

    protected $fillable = [
        'name',
        'email',
        'password',
        'profilePicture',
        'phone',
        'address',
        'email_verified_at',
        'remember_token'
    ];

    protected $hidden = [
        'name','email','password',
    ];
    
    /**
     * Get all of the reservations for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reserves(): HasMany
    {
        return $this->hasMany(Reserve::class, 'clients_id', 'id');
    }

    /**
     * Get all of the commands for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commands(): HasMany
    {
        return $this->hasMany(Command::class, 'clients_id', 'id');
    }
}
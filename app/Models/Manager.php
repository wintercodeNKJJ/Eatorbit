<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manager extends Authenticatable
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
        'remember_token',
    ];

    protected $hidden = [
        'name','email','password',
    ];

    /**
     * Get all of the restaurants for the Manager
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function restaurants(): HasMany
    {
        return $this->hasMany(Restaurant::class, 'managers_id', 'id');
    }
}
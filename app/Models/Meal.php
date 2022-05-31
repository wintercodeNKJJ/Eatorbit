<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meal extends Model
{
    use HasFactory;
    
    /**
     * The Restaurants that belong to the Meal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class, 'menu', 'meals_id', 'restaurants_id');
    }

    /**
     * Get all of the menus for the Meal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'meals_id', 'id');
    }
}
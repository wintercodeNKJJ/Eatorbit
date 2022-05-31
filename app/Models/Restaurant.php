<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurant extends Model
{
    use HasFactory;

    /**
     * Get the notices that owns the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notice(): BelongsTo
    {
        return $this->belongsTo(Notice::class, 'notices_id', 'id');
    }

    /**
     * Get the Manager that owns the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class, 'managers_id', 'id');
    }

    /**
     * The meals that belong to the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function meals(): BelongsToMany
    {
        return $this->belongsToMany(Meal::class, 'menus', 'restaurants_id', 'meals_id');
    }

    /**
     * Get all of the menu for the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class, 'restaurants_id', 'id');
    }

    /**
     * Get all of the reserves for the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reserves(): HasMany
    {
        return $this->hasMany(Reserve::class, 'restaurants_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    /**
     * Get the restaurant that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'restaurants_id', 'id');
    }

    /**
     * Get the meals that owns the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meal(): BelongsTo
    {
        return $this->belongsTo(Meal::class, 'meals_id', 'id');
    }

    /**
     * Get all of the commands for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commands(): HasMany
    {
        return $this->hasMany(Command::class, 'menus_id', 'id');
    }
}
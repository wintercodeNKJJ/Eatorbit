<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the Notice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function restaurant(): HasOne
    {
        return $this->hasOne(Restaurant::class, 'notices_id', 'id');
    }
}
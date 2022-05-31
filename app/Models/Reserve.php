<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurants_id',
        'clients_id',
        'Targetdate',
        'Canceldate',
        'numOfSites',
        'transactionID',
        'status',
        'cost'
    ];
    
    /**
     * Get the restaurant that owns the Reserve
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class, 'restaurants_id', 'id');
    }

    /**
     * Get the client that owns the Reserve
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'clients_id', 'id');
    }
}
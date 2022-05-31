<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Command extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'menus_id',
        'clients_id',
        'Targetdate',
        'Canceldate',
        'numOfSites',
        'transactionID',
        'status',
        'cost'
    ];
    /**
     * Get the menu that owns the Command
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menus_id', 'id');
    }

    /**
     * Get the client that owns the Command
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'clients_id', 'id');
    }
}
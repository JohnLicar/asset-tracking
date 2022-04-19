<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_SUSPENDED = 3;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quantity' => 'integer',
        'amount' => 'integer',
    ];

    protected $table = 'inventory';
    protected $fillable = [
        'quantity',
        'unit',
        'amount',
        'description',
        'life_span',
        'status',
        'isConsumable',
        'inventory_number'
    ];
}

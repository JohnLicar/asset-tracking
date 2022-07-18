<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

class Inventory extends Model
{
    use HasFactory, BelongsToThrough;

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


    public function qr()
    {
        return $this->hasMany(QrCode::class,  'inventory_id', 'id');
    }


    public function requesistion_item()
    {
        return $this->hasMany(RequisitionItem::class, 'inventory_id');
    }


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('inventory_number', 'like', '%' . $search . '%')
            ->OrWhere('unit', 'like', '%' . $search . '%');
    }
}

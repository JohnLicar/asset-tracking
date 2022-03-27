<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Requisition extends Model 
{
    use HasFactory, Notifiable;

    const STATUS_PENDING = 1;
    const STATUS_APRROVE = 2;
    const STATUS_DECLINE = 3;
    const STATUS_TO_RETURN = 4;

     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quantity' => 'integer',
    ];

    protected $table = 'requisition';

    protected $fillable = [
        'inventory_id',
        'quantity',
        'remarks',
        'devision',
        'office',
        'available',
        'purpose',
        'requested_by',
        'approved_by',
        'issued_by',
        'received_by',
        'status',
    ];

    public function unit(){
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

    public function requested(){
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function approved(){
        return $this->belongsTo(User::class, 'approved_by');
    }

    public static function search($search,  $status = null)
    {
        if (!$status == null) {
            return empty($status) ? static::query()
                : static::query()->where('status', 'like', '%' . $status . '%');
        }

        return empty($search) ? static::query()
            : static::query()->where('office', 'like', '%' . $search . '%');
    }

    protected static function booted()
    {
        static::creating(function ($requisition) {
            $requisition->requested_by = auth()->id();
        });
    }
}

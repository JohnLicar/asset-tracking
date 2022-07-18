<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionItem extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = [
        'requisition_id',
        'inventory_id',
        'quantity',
        'qr_code_id'
    ];

    protected $table = 'requisition_item';

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function requester()
    {
        return $this->belongsToThrough(
            User::class,
            Requisition::class,
            null,
            '',
            [User::class => 'requested_by']
        );
    }


    public function requesition()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }

    public function unit()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }


    public function qr_code()
    {
        return $this->belongsTo(QrCode::class, 'qr_code_id');
    }


    public function scopeInventory($query, $item)
    {
        return $query->where('requisition_id', $item);
    }
}

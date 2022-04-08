<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'requisition_id',
        'inventory_id',
        'quantity'
    ];

    protected $table = 'requisition_item';

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function requesition()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }

    public function unit()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }
}

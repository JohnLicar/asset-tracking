<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Znck\Eloquent\Traits\BelongsToThrough;

class QrCode extends Model
{
    use HasFactory, BelongsToThrough;

    protected $guarded = [];


    public function unit()
    {
        return $this->belongsTo(Inventory::class, 'inventory_id');
    }

    // public function requesition()
    // {
    //     return $this->belongsToThrough(
    //         Requisition::class,
    //         RequisitionItem::class,
    //         null,
    //         '',
    //         [Requisition::class => 'requisition_id']
    //     );
    // }

    public function requesition()
    {
        return $this->belongsToMany(Requisition::class, 'requisition_item');
    }
    public function requesition1()
    {
        return $this->hasOneThrough(
            Requisition::class,
            RequisitionItem::class,
            'qr_code_id',
            'id',
            'id',
            'id'
        );
    }
}

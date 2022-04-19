<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Requisition extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

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

    protected $dates = [
        'created_at',
        'updated_at',
        'approved_date',
        'issued_date'
    ];


    protected $table = 'requisition';

    protected $fillable = [

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
        'approved_date',
        'issued_date',
    ];

    public function request()
    {
        return $this->hasMany(RequisitionItem::class, 'requisition_id');
    }

    public function unit()
    {
        return $this->belongsToMany(Inventory::class, 'requisition_item')
            ->withPivot('quantity')
            ->where('isConsumable', 0);
    }

    public function requested()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function approved()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public static function search($search,  $status = null)
    {
        if (!$status == null) {
            return empty($status) ? static::query()
                : static::query()->where('status', 'like', '%' . $status . '%');
        }

        return empty($search) ? static::query()
            : static::query()->where('office', 'like', '%' . $search . '%')
            ->orWhereHas('requested', function ($query) use ($search) {
                $query->where('first_name', 'LIKE', '%' . $search . '%')
                    ->Orwhere('middle_name', 'LIKE', '%' . $search . '%')
                    ->Orwhere('last_name', 'LIKE', '%' . $search . '%');
            });
    }

    protected static function booted()
    {
        static::creating(function ($requisition) {
            $requisition->requested_by = auth()->id();
        });
    }
}

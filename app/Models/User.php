<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'idnumber',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'contact_number',
        'password',
        'position_id',
        'avatar',
        'signature',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return sprintf(
            '%s %s',
            $this->first_name,
            $this->last_name
        );
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }


    public function request()
    {
        return $this->hasMany(Requisition::class, 'requested_by')->withTrashed();
    }
    public function pending()
    {
        return $this->hasMany(Requisition::class, 'requested_by')->where('status', 1);
    }

    public function approve()
    {
        return $this->hasMany(Requisition::class, 'requested_by')->where('status', 2);
    }


    public function decline()
    {
        return $this->hasMany(Requisition::class, 'requested_by')->where('status', 3);
    }

    public function returned()
    {
        return $this->hasMany(Requisition::class, 'requested_by')->where('status', 4);
    }

    public function issued()
    {
        return $this->hasMany(Requisition::class, 'requested_by')->where('status', 5);
    }


    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('first_name', 'like', '%' . $search . '%')
            ->OrWhere('last_name', 'like', '%' . $search . '%')
            ->OrWhere('email', 'like', '%' . $search . '%');
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->password = Hash::make($user->last_name);
        });
    }
}

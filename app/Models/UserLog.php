<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('first_name', 'like', '%' . $search . '%')
            ->OrWhere('last_name', 'like', '%' . $search . '%')
            ->OrWhere('email', 'like', '%' . $search . '%');
    }
}

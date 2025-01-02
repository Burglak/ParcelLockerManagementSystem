<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Parcels;

class Courier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'courier_zone_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courierZone()
    {
        return $this->belongsTo(CourierZone::class);
    }

    public function parcels(): HasMany {
        return $this->hasMany(Parcels::class);
    }

    public function zone()
    {
        return $this->belongsTo(CourierZone::class, 'courier_zone_id');
    }
}

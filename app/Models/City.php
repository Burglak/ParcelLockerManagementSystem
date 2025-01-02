<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'zip_code',
    ];

    public function courierZones(): HasMany {
        return $this->hasMany(CourierZone::class);
    }

    public function parcelLockers(): HasMany {
        return $this->hasMany(ParcelLocker::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourierZone extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'description'];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function courier(): HasMany {
        return $this->hasMany(Courier::class);
    }

    public function couriers()
    {
        return $this->hasMany(Courier::class, 'courier_zone_id');
    }
}

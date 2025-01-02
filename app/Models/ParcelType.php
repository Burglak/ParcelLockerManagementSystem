<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ParcelType extends Model
{
    use HasFactory;

    protected $table = 'parcel_types';
    protected $fillable = ['name', 'price', 'weight', 'dimensions'];
    public $timestamps = false;

    public function parcels(): HasMany {
        return $this->hasMany(Parcel::class);
    }
}

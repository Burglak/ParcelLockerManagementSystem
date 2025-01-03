<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParcelStatus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function parcel(): HasMany {
        return $this->hasMany(Parcel::class);
    }
}

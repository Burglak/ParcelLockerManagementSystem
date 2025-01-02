<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use app\Models\Parcel;

class ParcelLocker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }

    public function parcels(): HasMany {
        return $this->hasMany(Parcel::class);
    }

    public function endLocker ()
    {
        return $this->belongsTo(ParcelLocker::class, 'end_locker_id');
    }

    public function startLocker ()
    {
        return $this->belongsTo(ParcelLocker::class, 'start_locker_id');
    }

    public function sender()
    {
    return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
    return $this->belongsTo(User::class, 'receiver_id');
    }

    public function status()
    {
        return $this->belongsTo(ParcelStatus::class, 'status_id');
    }
}


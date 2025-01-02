<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\ParcelLocker;
use App\Models\Courier;
use App\Models\ParcelStatus;
use App\Models\ParcelType;

class Parcels extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sender(): BelongsTo {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(): BelongsTo {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function startLocker(): BelongsTo {
        return $this->belongsTo(ParcelLocker::class, 'start_locker_id');
    }

    public function endLocker(): BelongsTo {
        return $this->belongsTo(ParcelLocker::class, 'end_locker_id');
    }

    public function courier(): BelongsTo {
        return $this->belongsTo(Courier::class, 'courier_id');
    }

    public function status(): BelongsTo {
        return $this->belongsTo(ParcelStatus::class, 'status_id');
    }

    public function type(): BelongsTo {
        return $this->belongsTo(ParcelType::class, 'type_id');
    }

}


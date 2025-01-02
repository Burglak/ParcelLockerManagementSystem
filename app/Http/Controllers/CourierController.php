<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Parcels;
use App\Models\Courier;
use App\Models\ParcelStatus;

class CourierController extends Controller
{
    public function index()
    {
    $user = Auth::user();
    $courier = Courier::where('user_id', $user->id)->first();

    if ($courier) {
        $parcels = Parcels::where('courier_id', $courier->id)
            ->where('status_id', '!=', 4)
            ->with(['startLocker', 'endLocker', 'status'])
            ->orderBy('created_at', 'desc')
            ->get();
    } else {
        $parcels = collect();
    }

    $statuses = ParcelStatus::all();

    return view('courier-dashboard', compact('parcels', 'statuses'));
    }

    public function updateParcels(Request $request)
    {
        $statuses = $request->input('statuses', []);

        foreach ($statuses as $parcelId => $statusId) {
            $parcel = Parcels::find($parcelId);
            if ($parcel && $parcel->courier_id == Auth::user()->courier->id) {
                $parcel->update(['status_id' => $statusId]);
            }
        }

        return redirect()->route('courier.parcels')->with('success', 'Statusy paczek zostały zaktualizowane.');
    }
}

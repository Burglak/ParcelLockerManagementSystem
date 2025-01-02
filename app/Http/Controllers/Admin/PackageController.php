<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Parcels;
use Illuminate\Http\Request;
use App\Models\ParcelStatus;
use App\Models\ParcelType;
use App\Models\Courier;
use App\Models\ParcelLocker;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Parcels::with(['sender', 'receiver', 'courier', 'startLocker', 'endLocker', 'status', 'type'])->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
{
    $statuses = ParcelStatus::all();
    $types = ParcelType::all();
    $couriers = Courier::all();
    $parcelLockers = ParcelLocker::all();
    
    return view('admin.packages.create', compact('statuses', 'types', 'couriers', 'parcelLockers'));
}

    public function store(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'courier_id' => 'required|exists:couriers,id',
            'start_locker_id' => 'required|exists:parcel_lockers,id',
            'end_locker_id' => 'required|exists:parcel_lockers,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status_id' => 'required|exists:parcel_statuses,id',
            'type_id' => 'required|exists:parcel_types,id',
        ]);

        Parcels::create($request->all());
        return redirect()->route('admin.packages')->with('success', 'Paczka została dodana.');
    }

    public function edit($id)
    {
        $package = Parcels::findOrFail($id);
        $statuses = ParcelStatus::all();
        $types = ParcelType::all();
        return view('admin.packages.edit', compact('package', 'statuses', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'courier_id' => 'required|exists:couriers,id',
            'start_locker_id' => 'required|exists:parcel_lockers,id',
            'end_locker_id' => 'required|exists:parcel_lockers,id',
            'name' => 'required|string',
            'code' => 'required|string',
            'description' => 'required|string',
            'status_id' => 'required|exists:statuses,id',
            'type_id' => 'required|exists:package_types,id',
        ]);

        $package = Parcels::findOrFail($id);
        $package->update($request->all());
        return redirect()->route('admin.packages')->with('success', 'Paczka została zaktualizowana.');
    }

    public function destroy($id)
    {
        $package = Parcels::findOrFail($id);
        $package->delete();
        return redirect()->route('admin.packages')->with('success', 'Paczka została usunięta.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParcelLocker;
use App\Models\City;
use Illuminate\Http\Request;

class ParcelLockerController extends Controller
{
    public function index()
    {
        $parcelLockers = ParcelLocker::with('city')->get();
        return view('admin.parcel-lockers.index', compact('parcelLockers'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.parcel-lockers.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string|max:255',
        ]);

        ParcelLocker::create($request->all());
        return redirect()->route('admin.parcel-lockers')->with('success', 'Paczkomat został dodany.');
    }

    public function edit($id)
    {
        $parcelLocker = ParcelLocker::findOrFail($id);
        $cities = City::all();
        return view('admin.parcel-lockers.edit', compact('parcelLocker', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string|max:255',
        ]);

        $parcelLocker = ParcelLocker::findOrFail($id);
        $parcelLocker->update($request->all());
        return redirect()->route('admin.parcel-lockers')->with('success', 'Paczkomat został zaktualizowany.');
    }

    public function destroy($id)
    {
        $parcelLocker = ParcelLocker::findOrFail($id);
        $parcelLocker->delete();
        return redirect()->route('admin.parcel-lockers')->with('success', 'Paczkomat został usunięty.');
    }
}

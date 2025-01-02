<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourierZone;
use App\Models\City;
use Illuminate\Http\Request;

class CourierZoneController extends Controller
{
    public function index()
    {
        $courierZones = CourierZone::with('city')->get();
        return view('admin.courier_zones.index', compact('courierZones'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.courier_zones.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'description' => 'required|string',
        ]);

        CourierZone::create($request->all());
        return redirect()->route('admin.courier-zones.index')->with('success', 'Strefa kurierska została dodana pomyślnie.');
    }

    public function edit($id)
    {
        $zone = CourierZone::findOrFail($id);
        $cities = City::all();
        return view('admin.courier_zones.edit', compact('zone', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'description' => 'required|string',
        ]);

        $zone = CourierZone::findOrFail($id);
        $zone->update($request->all());
        return redirect()->route('admin.courier-zones.index')->with('success', 'Strefa kurierska została zaktualizowana pomyślnie.');
    }

    public function destroy($id)
    {
        $zone = CourierZone::findOrFail($id);
        $zone->delete();
        return redirect()->route('admin.courier-zones.index')->with('success', 'Strefa kurierska została usunięta pomyślnie.');
    }
}

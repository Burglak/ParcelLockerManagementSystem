<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\CourierZone;
use App\Models\User;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        $couriers = Courier::with(['user', 'courierZone'])->get();
        return view('admin.couriers.index', compact('couriers'));
    }

    public function create()
    {
        $users = User::all();
        $courierZones = CourierZone::all();
        return view('admin.couriers.create', compact('users', 'courierZones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'courier_zone_id' => 'required|exists:courier_zones,id',
        ]);

        Courier::create($request->all());
        return redirect()->route('admin.couriers')->with('success', 'Kurier został dodany.');
    }

    public function edit($id)
    {
        $courier = Courier::findOrFail($id);
        $users = User::all();
        $courierZones = CourierZone::all();
        return view('admin.couriers.edit', compact('courier', 'users', 'courierZones'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'courier_zone_id' => 'required|exists:courier_zones,id',
        ]);

        $courier = Courier::findOrFail($id);
        $courier->update($request->all());
        return redirect()->route('admin.couriers')->with('success', 'Kurier został zaktualizowany.');
    }

    public function destroy($id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();
        return redirect()->route('admin.couriers')->with('success', 'Kurier został usunięty.');
    }
}

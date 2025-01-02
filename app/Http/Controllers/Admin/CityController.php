<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
        ]);

        City::create($request->all());

        return redirect()->route('admin.cities')->with('success', 'City created successfully');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $city->update($request->all());
        return redirect()->route('admin.cities')->with('success', 'City updated successfully');
    }

    public function destroy($id)
{
    $city = City::findOrFail($id);

    $city->parcelLockers()->delete();

    $city->delete();

    return redirect()->route('admin.cities')->with('success', 'City and related records deleted successfully');
}

}

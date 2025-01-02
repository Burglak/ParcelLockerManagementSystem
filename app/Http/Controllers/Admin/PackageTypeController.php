<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParcelType;
use Illuminate\Http\Request;

class PackageTypeController extends Controller
{
    public function index()
    {
        $packageTypes = ParcelType::all();
        return view('admin.package-types.index', compact('packageTypes'));
    }

    public function create()
    {
        return view('admin.package-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'dimensions' => 'required|string|max:255',
        ]);

        ParcelType::create($request->all());
        return redirect()->route('admin.package-types.index')->with('success', 'Typ paczki został dodany pomyślnie.');
    }

    public function edit($id)
    {
        $packageType = ParcelType::findOrFail($id);
        return view('admin.package-types.edit', compact('packageType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'weight' => 'required|string|max:255',
            'dimensions' => 'required|string|max:255',
        ]);

        $packageType = ParcelType::findOrFail($id);
        $packageType->update($request->all());
        return redirect()->route('admin.package-types.index')->with('success', 'Typ paczki został zaktualizowany pomyślnie.');
    }

    public function destroy($id)
    {
        $packageType = ParcelType::findOrFail($id);
        $packageType->delete();
        return redirect()->route('admin.package-types.index')->with('success', 'Typ paczki został usunięty pomyślnie.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParcelStatus;
use Illuminate\Http\Request;

class PackageStatusController extends Controller
{
    public function index()
    {
        $packageStatuses = ParcelStatus::all();
        return view('admin.package_statuses.index', compact('packageStatuses'));
    }

    public function create()
    {
        return view('admin.package_statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ParcelStatus::create($request->all());
        return redirect()->route('admin.package-statuses')->with('success', 'Status paczki został dodany.');
    }

    public function edit($id)
    {
        $packageStatus = ParcelStatus::findOrFail($id);
        return view('admin.package_statuses.edit', compact('packageStatus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $packageStatus = ParcelStatus::findOrFail($id);
        $packageStatus->update($request->all());
        return redirect()->route('admin.package-statuses')->with('success', 'Status paczki został zaktualizowany.');
    }

    public function destroy($id)
    {
        $packageStatus = ParcelStatus::findOrFail($id);
        $packageStatus->delete();
        return redirect()->route('admin.package-statuses')->with('success', 'Status paczki został usunięty.');
    }
}

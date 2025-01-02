<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        Company::create($request->all());

        return redirect()->route('admin.companies')->with('success', 'Firma dodana pomyślnie');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('admin.companies')->with('success', 'Firma zaktualizowana pomyślnie');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.companies')->with('success', 'Firma usunięta pomyślnie');
    }
}

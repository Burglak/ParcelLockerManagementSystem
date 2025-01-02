<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->filled('company_id')) {
            $company = Company::find($request->company_id);
            if (!$company) {
                return redirect()->back()->with('error', 'Firma o podanym ID nie istnieje.');
            }
        }

        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'Użytkownik został zaktualizowany pomyślnie.');
    }

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.dashboard')->with('success', 'Użytkownik usunięty pomyślnie');
}

}

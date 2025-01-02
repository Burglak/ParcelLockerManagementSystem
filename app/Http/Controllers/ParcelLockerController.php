<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelLocker;

class ParcelLockerController extends Controller
{
    public function index()
    {
        $parcel_lockers = ParcelLocker::all();
        return view('parcel-lockers', ['parcel_lockers' => $parcel_lockers]);
    }
}

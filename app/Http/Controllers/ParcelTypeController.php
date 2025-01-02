<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParcelType;

class ParcelTypeController extends Controller
{
    public function index()
    {
        $parcelTypes = ParcelType::all();
        return view('send', compact('parcelTypes'));
    }
}

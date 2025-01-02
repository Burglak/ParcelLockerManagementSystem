<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Parcels;
use App\Models\ParcelLocker;
use App\Models\ParcelType;
use App\Models\Courier;
use App\Models\User;

class ParcelsController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $parcels = Parcels::where('receiver_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('my-packages', ['parcels' => $parcels]);
    }

    public function sent(){
        $userId = auth()->id();

        $parcels = Parcels::where('sender_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('sent-packages', ['parcels' => $parcels]);
    }

    public function create()
    {
        $lockers = ParcelLocker::all();
        $types = ParcelType::all();
        
        return view('send', compact('lockers', 'types'));
    }

    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'recipient_number' => 'required',
            'start_locker_id' => 'required',
            'end_locker_id' => 'required',
            'parcel_name' => 'required|string|max:255',
            'parcel_description' => 'required|string',
            'parcel_type_id' => 'required|exists:parcel_types,id',
        ]);

        $senderId = Auth::id();
        $recipient = User::where('phone_number', $request->recipient_number)->first();

        if (!$recipient) {
            return redirect()->back()->withErrors(['recipient_number' => 'Nie znaleziono odbiorcy o podanym numerze.']);
        }
        

        $startLocker = ParcelLocker::findOrFail($request->start_locker_id);

        $couriers = Courier::all();

        $courier = $couriers->random();

        $code = random_int(100000, 999999);

        // Tworzenie paczki
        Parcels::create([
            'sender_id' => $senderId,
            'receiver_id' => $recipient->id,
            'start_locker_id' => $request->start_locker_id,
            'end_locker_id' => $request->end_locker_id,
            'name' => $request->parcel_name,
            'description' => $request->parcel_description,
            'type_id' => $request->parcel_type_id,
            'courier_id' => $courier->id,
            'code' => $code,
            'status_id' => 1,
        ]);


        return redirect()->route('sent-packages')->with('message', 'Udało się utworzyć przesyłkę. Użyj podanego kodu do nadania paczki w wybranym paczkomacie. Pamiętaj o opłaceniu paczki w punkcie nadania.');
    }
}

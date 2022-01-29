<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'booking_date' => 'required',
            'flexibility' => 'required',
            'vehicle_size' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required'
        ];

        $this->validate($request, $rules);

        $booking = Booking::create($request->input());

        return view('index', ['booking' => $booking]);
    }
}

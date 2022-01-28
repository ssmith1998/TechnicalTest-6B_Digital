<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookingForm(Request $request)
    {
        if ($request->type === 'Edit'  && $request->has('booking')) {
            $data = Booking::find($request->booking);
        } else {
            $data = null;
        }
        return view('admin.bookings.bookingsForm', ['type' => $request->type, 'data' => $data]);
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

        return redirect('/admin/dashboard')->with('success', 'Booking Created Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
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

        $booking = $booking->update($request->input());

        return redirect('/admin/dashboard')->with('success', 'Booking Updated Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

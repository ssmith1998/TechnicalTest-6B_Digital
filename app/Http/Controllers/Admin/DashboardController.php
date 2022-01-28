<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.dashboard', ['bookings' => $bookings]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\SelectChoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            $bookings = Booking::orderBy('created_at', 'desc')->paginate(5);
            return view('admin.dashboard', ['bookings' => $bookings]);
        } else {
            return redirect('/admin/login');
        }
    }
}

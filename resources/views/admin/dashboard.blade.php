@extends('admin.base')

@section('content')
<div class="wrapper_inner py-5 px-5 w-100">
<h1 class="text-bold">Dashboard</h1>
<div class="toolbar d-flex justify-content-between">
<h4>Bookings</h4>
<a href="/admin/booking?type=Add"><button class="btn btn-success">Add Booking</button></a> 
</div>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if (isset($bookings) && COUNT($bookings) > 0)
<table class="table small-table" style="height:200px;">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Vehicle Size</th>
      <th scope="col">Date</th>
      <th scope="col">Flexibility</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
@foreach ($bookings as $booking)
   <tr>
      <td>{{$booking->name}}</td>
      <td>{{$booking->email_address}}</td>
      <td>{{$booking->contact_number}}</td>
      <td>{{$booking->vehicle_size}}</td>
      <td>{{$booking->booking_date->format('d-m-Y')}}</td>
      @if ($booking->flexibility !== 0)
      <td>+/- {{$booking->flexibility}}</td>
      @else
      <td>N/A</td>
      @endif
      <td><a href="/admin/booking?type=Edit&booking={{$booking->id}}"><button class="btn btn-primary">Edit</button></a></td>
      <td><p>Confirm</p></td>
      <td><p>Delete</p></td>
    </tr>
@endforeach
    
  </tbody>
</table>   
<div class="pagination d-flex justify-content-center">
{{ $bookings->links() }}
</div>

</div>
@endif
@endsection
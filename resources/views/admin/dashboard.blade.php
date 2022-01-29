@extends('admin.base')

@section('content')
<div class="wrapper_inner py-5 px-5 w-100">
<div class="top_toolbar__wrapper d-flex justify-content-between">
<h1 class="text-bold">Dashboard</h1>
<a href="/admin/logout"><button class="btn btn-danger">Logout</button></a>
</div>
<div class="toolbar d-flex justify-content-between">
<h4>Bookings</h4>
<div class="actions__wrapper">
<a href="/admin/booking?type=Add"><button class="btn btn-success">Add Booking</button></a> 
<a href="/admin/choices"><button class="btn btn-primary">View Select Choices</button></a>
</div>

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
    @if ($booking->confirmed)
       <tr style="background-color: #22b531; color: #fff;">
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
      <td><a href="/admin/bookings/delete/{{$booking->id}}"><button class="btn btn-danger">Delete</button></a></td>
      <td></td>
    </tr>  
    @else
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
      <td><a href="/admin/bookings/confirm/{{$booking->id}}"><button class="btn btn-success">Confirm</button></a></td>
      <td><a href="/admin/bookings/delete/{{$booking->id}}"><button class="btn btn-danger">Delete</button></a></td>
    </tr>
    @endif
@endforeach
    
  </tbody>
</table>   
<div class="pagination d-flex justify-content-center">
{{ $bookings->links() }}
</div>

</div>
@endif
@endsection
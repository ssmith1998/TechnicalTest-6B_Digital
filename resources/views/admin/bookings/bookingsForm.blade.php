@extends('admin.base')
@section('content')
<h1 class="text-center py-3">{{$type}} Booking</h1>
@if ($errors->any())
    <div class="alert alert-danger w-75">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (isset($data))
<form action="/admin/bookings/{{$data->id}}" method="post" class="booking_form p-5">
        @csrf
        <h4 class="text-center py-3 text-white">{{$type}} Booking</h4>
        <div class="row">
        <div class="col-xs-12 col-sm-6">
        <input class="form-control" name="name" type="text" placeholder="Name" value="{{$data->name}}">
        </div>
        <div class="col-xs-12 col-sm-6">
        <input class="form-control" name="booking_date" type="date" placeholder="Booking Date" value="{{$data->booking_date->format('Y-m-d')}}">
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        @if (isset($flexChoices) && COUNT($flexChoices) > 0)
         <select class="form-control" name="flexibility" id="flexibility">
            <option disabled selected value> -- Select Flexibility -- </option>
            @foreach ($flexChoices as $flex)
            @if ($data->flexibility === (int)$flex->value)
               <option selected value="{{$flex->value}}">{{$flex->label}}</option>
            @else
               <option value="{{$flex->value}}">{{$flex->label}}</option>
            @endif
            @endforeach
         </select>
        @else   
      <select class="form-control" name="flexibility" id="flexibility">
            <option disabled selected value> -- Select Flexibility -- </option>
               @if (isset($data) && $data->flexibility == 1)
               <option selected value="1">+/- 1 day</option>
               @else
               <option value="1">+/- 1 day</option>
               @endif
               @if (isset($data) && $data->flexibility == 2)
               <option selected value="2">+/- 2 day</option>
               @else
               <option value="2">+/- 2 day</option>
               @endif
               @if (isset($data) && $data->flexibility == 3)
               <option selected value="1">+/- 3 day</option>
               @else
               <option value="1">+/- 3 day</option>
               @endif
        </select> 
        @endif
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
      @if (isset($sizeChoices) && COUNT($sizeChoices) > 0)
         <select class="form-control" name="vehicle_size" id="vehicle_size">
            <option disabled selected value> -- Select Vehicle Size -- </option>
         @foreach ($sizeChoices as $size)
            @if ($data->vehicle_size === $size->value)
            <option selected value="{{$size->value}}">{{$size->label}}</option>
            @else
            <option value="{{$size->value}}">{{$size->label}}</option>
            @endif
         @endforeach
         </select>
      @else
         <select class="form-control" name="vehicle_size" id="vehicle_size">
            <option disabled selected value> -- Select Vehicle Size -- </option>
               @if (isset($data) && $data->vehicle_size == 'small')
            <option selected value="small">Small</option>
               @else
               <option value="small">Small</option>
               @endif
                  @if (isset($data) && $data->vehicle_size == 'medium')
            <option selected value="medium">Medium</option>
               @else
               <option value="medium">Medium</option>
               @endif
            @if (isset($data) && $data->vehicle_size == 'large')
            <option selected value="large">large</option>
               @else
               <option value="large">Large</option>
               @endif
               @if (isset($data) && $data->vehicle_size == 'van')
            <option selected value="van">Van</option>
               @else
               <option value="van">Van</option>
               @endif
      </select> 
   @endif
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <input class="form-control" name="contact_number" type="number" placeholder="Contact Number" value="{{$data->contact_number}}">
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <input class="form-control" type="email" name="email_address" placeholder="Email Address" value="{{$data->email_address}}">
        </div>

        <div class="col-xs-12  pt-sm-3 w-100 d-flex justify-content-center align-items-center">
        <button class="btn btn-primary w-75 submitBooking" type="submit">Update Booking</button>
        </div>


        </div>

</form>
@else
<form action="/admin/bookings" method="post" class="booking_form p-5">
        @csrf
        <h4 class="text-center py-3 text-white">{{$type}} Booking</h4>
        <div class="row">
        <div class="col-xs-12 col-sm-6">
        <input class="form-control" name="name" type="text" placeholder="Name">
        </div>
        <div class="col-xs-12 col-sm-6">
        <input class="form-control" name="booking_date" type="date" placeholder="Booking Date">
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
         @if (isset($flexChoices) && COUNT($flexChoices) > 0)
            <select class="form-control" name="flexibility" id="flexibility">
            <option disabled selected value> -- Select Flexibility -- </option>
               @foreach ( $flexChoices as $flex)
               <option value="{{$flex->value}}">{{$flex->label}}</option>
               @endforeach
               </select>
         @else   
            <select class="form-control" name="flexibility" id="flexibility">
               <option disabled selected value> -- Select Flexibility -- </option>
               <option value="1">+/- 1 day</option>
               <option value="2">+/- 2 day</option>
               <option value="3">+/- 3 day</option>
               </select> 
         @endif
        </select>
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
            @if (isset($sizeChoices) && COUNT($sizeChoices) > 0)
                  <select class="form-control" name="vehicle_size" id="vehicle_size">
                  <option disabled selected value> -- Select Vehicle Size -- </option>
                  @foreach ($sizeChoices as $size)
                  <option value="{{$size->value}}">{{$size->label}}</option>
                  @endforeach
                  </select>
                  @else
                  <select class="form-control" name="vehicle_size" id="vehicle_size">
                  <option disabled selected value> -- Select Vehicle Size -- </option>
                  <option value="small">small</option>
                  <option value="medium">medium</option>
                  <option value="large">Large</option>
                  <option value="van">Van</option>
                  </select>
               @endif
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <input class="form-control" name="contact_number" type="number" placeholder="Contact Number">
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <input class="form-control" type="email" name="email_address" placeholder="Email Address">
        </div>

        <div class="col-xs-12  pt-sm-3 w-100 d-flex justify-content-center align-items-center">
        <button class="btn btn-primary w-75 submitBooking" type="submit">Save Booking</button>
        </div>


        </div>

</form>
@endif

@endsection

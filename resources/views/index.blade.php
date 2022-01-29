<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dj Valeting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" type="text/css">
</head>
<body>
<div class="wrapperMain" style="background-image: url('https://images.unsplash.com/photo-1607860108855-64acf2078ed9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80'); background-repeat: no-repeat; background-size: cover;">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (!isset($booking))
<form action="/bookings" method="post" class="booking_form p-5">
        @csrf
        <h4 class="text-center py-3 text-white">Booking Form</h4>
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
            <option value="0">Flexibility</option>
            @foreach ( $flexChoices as $flex)
            <option value="{{$flex->value}}">{{$flex->label}}</option>
            @endforeach
            </select>
        @else   
         <select class="form-control" name="flexibility" id="flexibility">
            <option value="0">Flexibility</option>
            <option value="1">+/- 1 day</option>
            <option value="2">+/- 2 day</option>
            <option value="3">+/- 3 day</option>
            </select> 
        @endif
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
       @if (isset($sizeChoices) && COUNT($sizeChoices) > 0)
                    <select class="form-control" name="vehicle_size" id="vehicle_size">
                    <option value="size">Vehicle Size</option>
                    @foreach ($sizeChoices as $size)
                    <option value="{{$size->value}}">{{$size->label}}</option>
                    @endforeach
                    </select>
                    @else
                    <select class="form-control" name="vehicle_size" id="vehicle_size">
                    <option value="size">Vehicle Size</option>
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
        <button class="btn btn-primary w-75 submitBooking" type="submit">Book Valet</button>
        </div>


        </div>

</form>

@else
<form action="/bookings" method="post" class="booking_confirmed p-5">
        @csrf
        <h4 class="text-center py-3 text-white">Booking Request Sent</h4>
        <div class="row">
        <div class="col-xs-12 col-sm-6">
        <input readonly class="form-control" name="name" type="text" placeholder="Name" value="{{ $booking->name }}">
        </div>
        <div class="col-xs-12 col-sm-6">
        <input readonly class="form-control" name="booking_date" type="date" placeholder="Booking Date" value="{{ $booking->booking_date->format('Y-m-d')}}">
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <select disabled class="form-control" name="flexibility" id="flexibility"">
        <option selected value="0">+/- {{$booking->flexibility}} day</option>
        </select>
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <select disabled class="form-control" name="vehicle_size" id="vehicle_size" value="{{ $booking->vehicle_size }}">
        <option selected value="0">{{$booking->vehicle_size}}</option>
        </select>
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <input readonly class="form-control" name="contact_number" type="number" placeholder="Contact Number" value="{{ $booking->contact_number }}">
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <input readonly class="form-control" type="email" name="email_address" placeholder="Email Address" value="{{ $booking->email_address }}">
        </div>

        <div class="col-xs-12  pt-sm-3 w-100 d-flex justify-content-center align-items-center">
        <a href="/" class="btn btn-primary w-75 submitBooking" type="submit">Make another Booking</a>
        </div>


        </div>

</form>
@endif

</div>
</body>
</html>
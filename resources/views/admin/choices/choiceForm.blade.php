@extends('admin.base')
@section('content')
<h1 class="text-center py-3">{{$type}} Choice</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (isset($data))
<form action="/admin/choices/{{$data->id}}" method="post" class="choices_form p-5">
        @csrf
        <h4 class="text-center py-3 text-white">{{$type}} Choice</h4>
        <div class="row">
        <div class="col-xs-12 col-sm-6">
        <input class="form-control" name="label" type="text" placeholder="Name" value="{{$data->label}}">
        </div>
        <div class="col-xs-12 col-sm-6">
        <input class="form-control" name="value" type="text" placeholder="Value" value="{{$data->value}}">
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <select class="form-control" name="type" id="type">
        <option value="0">Type</option>
        @if (isset($data) && $data->type == 'flexibility')
        <option selected value="flexibility">Flexibility</option>
        @else
        <option value="flexibility">Flexibility</option>
        @endif
        @if (isset($data) && $data->type == 'vehicle_size')
        <option selected value="vehicle_size">Vehicle Size</option>
        @else
        <option value="vehicle_size">Vehicle Size</option>
        @endif
        </select>
        </div>
        <div class="col-xs-12  pt-sm-3 w-100 d-flex justify-content-center align-items-center">
        <button class="btn btn-primary w-75 submitBooking" type="submit">Update Choice</button>
        </div>


        </div>

</form>
@else
<form action="/admin/choices" method="post" class="choices_form p-5">
        @csrf
        <h4 class="text-center py-3 text-white">{{$type}} Choice</h4>
        <div class="row">
        <div class="col-xs-12 col-sm-6">
        <input class="form-control" name="label" type="text" placeholder="Label">
        </div>
        <div class="col-xs-12 col-sm-6">
        <input class="form-control" name="value" type="text" placeholder="Value">
        </div>
        <div class="col-xs-12 col-sm-6 pt-sm-3">
        <select class="form-control" name="type" id="type">
        <option value="0">Type</option>
        <option value="flexibility">Flexibility</option>
        <option value="vehicle_size">Vehicle Size</option>
        </select>
        </div>
        <div class="col-xs-12  pt-sm-3 w-100 d-flex justify-content-center align-items-center">
        <button class="btn btn-primary w-75 submitBooking" type="submit">Save Choice</button>
        </div>


        </div>

</form>
@endif
@endsection

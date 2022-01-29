@extends('auth.base')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <form action="/login" method="post" class="login-form p-5">   
   <h4 class="pb-4 text-center text-white">Admin Login</h4>
    @csrf
   <div class="row">
   <div class="col-xs-12 col-sm-6">
   <input type="email" class="form-control" placeholder="Email" name="email" required>
   </div>
   <div class="col-xs-12 col-sm-6">
   <input type="password" class="form-control" placeholder="Password" name="password" required>
   </div>

   <div class="col-xs-12 text-center pt-3">
   <button type="text" class="btn btn-primary w-75" type="submit">Login</button>
   </div>
   </div>
   
   </form>
@endsection
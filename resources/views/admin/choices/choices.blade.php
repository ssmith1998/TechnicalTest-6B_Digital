@extends('admin.base')

@section('content')
<div class="wrapper_inner py-5 px-5 w-100">

        <h1 class="text-center py-3">Choices</h1>

        <div class="selectOptions">
        <div class="toolbar__choices d-flex justify-content-between">
        <div class="wrapper">
       <a href="/admin/dashboard"><button class="btn btn-primary">Dashboard</button></a> 
        </div>
        <a href="/admin/choices/form?type=Add"><button class="btn btn-success">Add Choice</button></a>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Label</th>
            <th scope="col">Value</th>
            <th scope="col">Type</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @if(isset($choices) && COUNT($choices) > 0)
        @foreach ($choices as $choice )
            <tr>
            <td>{{$choice->label}}</td>
            <td>{{$choice->value}}</td>
            <td>{{$choice->type === 'vehicle_size' ? 'Vehicle Size' : 'Flexibility'}}</td>
            <td>
            <td><a href="/admin/choices/form?type=Edit&choice={{$choice->id}}"><button class="btn btn-primary">Edit</button></a></td>
            <td><a href="/admin/choices/delete/{{$choice->id}}"><button class="btn btn-danger">Delete</button></a></td>
            </td>
            </tr>
        @endforeach
        @else
        <tr>
            <td><p>There are no records to show</p></td>
            </tr>
        @endif
        </tbody>
        </table>
        <div class="pagination d-flex justify-content-center">
        {{ $choices->links() }}
        </div>
        </div>
</div>

@endsection
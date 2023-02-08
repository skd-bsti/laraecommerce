@extends('layouts.admin')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>colors list
                    <a href="{{ route('color.create') }}" class="btn btn-sm btn-primary float-end">Add New color </a>
                </h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                       <thead>
                        <tr> 
                            <th>ID</th>
                            <th>name</th>
                            <th>code</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $item)
                            
                       
                        <tr>
                            
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->status ? 'Hidden':'Visible' }}</td>
                                                    
                            <td>
                                    <a href="{{ route('color.edit', $item->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ route('color.delete', $item->id) }}" onclick="return confirm('Are you sure to delelte this item?')" class="btn btn-sm btn-warning">Delete</a>
                            </td>                          
                        </tr>
                        @endforeach
                    </tbody>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
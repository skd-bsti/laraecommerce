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
                    <h4>Products list
                    <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary float-end">Add New Product </a>
                </h4>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                       <thead>
                        <tr> 
                            <th>ID</th>
                            <th>category</th>
                            <th>product</th>
                            <th>price</th>
                            <th>quantity</th>
                            {{-- <th>Image</th> --}}
                            <th>status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                       <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td> 
                                @if($product->category)
                                {{ $product->category->name }}
                                
                            @else
                                No Category found
                            @endif
                                </td>
                            {{-- In above line category is from product model relation function  --}}
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->original_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            {{-- <td>
                                
                            @if($product->productImages)
                                @foreach ( $product->productImages as $image)
                                    <img src="{{ asset( $image->image) }}"  class="me-4 border" style="width: 80px; height:80px;" alt="Img"  >  
                                @endforeach
                                
                            @else
                               <h4>No image added</h4> 
                            @endif
                        </td> --}}
                            <td>{{ $product->status == 1 ? 'hidden':'visible' }}</td>
                            <td>
                                <a href="{{ route('product.edit', $product->id ) }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ route('product.delete', $product->id ) }}" onclick="return confirm('Are you sure to delelte this data?')" class="btn btn-sm btn-warning">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Product Available</td>
                        </tr>
                        @endforelse
                      
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
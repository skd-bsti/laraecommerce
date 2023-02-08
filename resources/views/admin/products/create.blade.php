@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class=" row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">{{ __('Add new Product') }} <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary float-end">Back</a>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <div >{{ $error }}</div>
                        @endforeach
                        </div>
                    @endif
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button  class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                            Home
                          </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                            SEO Tags
                        </button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">
                            Details
                        </button>
                        </li>  
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                            Product images
                          </button>
                          </li>    
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                            Product Colors
                          </button>
                          </li>                  
                        </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane  border p-3 fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="catagory">Category</label>
                                <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                   
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" value="" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="">Product slug</label>
                                <input type="text" class="form-control" value="" name="slug">
                            </div>
                            <div class="mb-3">
                                <label for="">Product brand</label>
                                <select name="brand" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                @endforeach
                                  </select>
                                                                                   
                            </div>
                            <div class="mb-3">
                                <label for="">Product short_description</label>
                                <textarea name="short_description" id="" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Product description</label>
                                <textarea name="description" id="" class="form-control"></textarea>
                            </div>
                                                   
                        </div>
                        <div class="tab-pane border p-3  fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Product meta_title</label>
                                <input type="text" class="form-control" value="" name="meta_title">
                            </div>
                            <div class="mb-3">
                                <label for="">Product meta_keyword</label>
                                <input type="text" class="form-control" value="" name="meta_keyword">
                            </div>
                            <div class="mb-3">
                                <label for="">Product meta_description</label>
                                <textarea name="meta_description" id="" class="form-control"></textarea>

                            </div>
                        </div>
                        <div class="tab-pane  border p-3 fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                            
                            <div class="row">
                              
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                        <label for="">Product original_price</label>
                                        <input type="number" class="form-control" value="" name="original_price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Product selling_price</label>
                                        <input type="number" class="form-control" value="" name="selling_price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Product quantity</label>
                                        <input type="number" class="form-control" value="" name="quantity">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Product trending</label>
                                        <input type="checkbox"  value="" name="trending">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">status</label>
                                        <input type="checkbox"  value="" name="status">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane border p-3  fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="">Upload Product Images</label>
                                    <input type="file" name="image[]" multiple class="form-control" value="" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane border p-3  fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for=""> Select Colors</label>
                                    <hr>
                                    <div class="row">
                                        @forelse ( $colors as $coloritem )
                                        
                                        <div class="col-md-3"> 
                                            <div class="p-2 border mb-3">
                                            Color: <input type="checkbox" name="colors[{{ $coloritem->id }}]" value=" {{ $coloritem->id }}"> {{ $coloritem->name }} </br>
                                            Quantity: <input type="number" name="colorquantity[{{ $coloritem->id }}]" style="width: 70px; border:1px solid" >
                                        </div>
                                    </div>
                                            @empty
                                            <div class="col-md-12">
                                                <h4>No Colors Found</h4>
                                            </div>
                                        @endforelse 
                                    </div>                                                                       
                                </div>
                            </div>
                        </div>
                            <div>
                            <button type="submit" class="btn-sm btn-primary"> Submit </button>
                            </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

{{-- <script type="text/javascript">
    $(document).ready(function(){
        console.log('hello world');
    });
</script> --}}
 
@endpush

@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">{{ __('Edit Category') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('category.update',$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">Category Name </label>
                                <input type="text" class="form-control " name="name" value="{{ $data->name }}"  placeholder="Enter your category name">
                                @if ($errors->any())
                                <label for="name" class="error text-danger">{{ $errors->first('name') }}</label> 
                                 @endif
                            </div>
                            
                            <div class=" col-md-6 mb-3">
                                <label  class="form-label">Slug </label>
                                <input type="text" class="form-control" value="{{ $data->slug }}" name="slug" placeholder="slug">
                               
                                @if ($errors->any())
                                <label for="slug" class="error text-danger">{{ $errors->first('slug') }}</label> 
                                 @endif
                              
                            </div>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Description</label>
                            <textarea name="description" class="form-control" name="description" rows="3" placeholder="description">{{ $data->description}}</textarea>
                            @if ($errors->any())
                            <label for="description" class="error text-danger">{{ $errors->first('description') }}</label> 
                             @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">Image </label>
                                <input type="file" class="form-control"  name="image" placeholder="image">
                               <img src="{{ asset('/uploads/category/'. $data->image) }}" width="60px" height="60px"  alt="">
                                @if ($errors->any())
                                <label for="image" class="error text-danger">{{ $errors->first('image') }}</label> 
                                 @endif
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label  class="form-label">Status </label><br>
                                <input type="checkbox"  name="status" placeholder="" {{ $data->status == '1' ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class=" col-md-12 mb-3">
                            <h4  class="form-label">SEO Tags </h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">Meta title </label>
                                <input type="text" class="form-control" value="{{ $data->meta_title }}" name="meta_title" placeholder="meta title">
                                @if ($errors->any())
                                <label for="meta_title" class="error text-danger">{{ $errors->first('meta_title') }}</label> 
                                 @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">Meta Keyword </label>
                                <input type="text" class="form-control" value="{{ $data->meta_keyword }}"  name="meta_keyword" placeholder="Keyword">
                                @if ($errors->any())
                                <label for="meta_keyword" class="error text-danger">{{ $errors->first('meta_keyword') }}</label> 
                                 @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Meta Description </label>
                            <input type="text" class="form-control " value="{{ $data->meta_description }}" name="meta_description" value="{{ old('meta_description') }}" placeholder="meta description">
                            @if ($errors->any())
                            <label for="meta_description" class="error text-danger">{{ $errors->first('meta_description') }}</label> 
                             @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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


@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">{{ __('Add new color') }} <a href="{{ route('color.index') }}" class="btn btn-sm btn-primary float-end">Back</a>
                </div>

                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <div >{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ route('color.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Colors Name</label>
                            <input type="text" class="form-control" value="" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="">Colors Code</label>
                            <input type="text" class="form-control" value="" name="code">
                        </div>
                        <div class="mb-3">
                            <label for="">Colors Status</label> </br> 
                            <input type="checkbox"  name="status" > Checked = Hidden, Unchecked= visible
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

<div>
    <!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent='destroyCategory'>
        <div class="modal-body">
          <h6>Are you sure to delete the data?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yes, Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    <div class="row">

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

            <div class="col-md-12 ">
              <div class="card">
              <div class="card-header">
                <h3>Category
                  <a href="{{ url('admin/category/create') }}" class="btn btn-sm btn-primary float-end text-white">Add Category</a>
                </h3>
              </div>
                <div class="card-body">
             <table class="table table-success table-striped">
           
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $categories as $category )
                    <tr>
                    <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status == '1' ? 'Hidden': 'Visible' }}</td>
                        <td>
                           <a href="{{ route('category.edit', $category->id ) }}" class="btn btn-sm btn-success text-white">Edit</a>
                           <a href="{{ route('category.delete', $category->id ) }}" wire:click="deleteCategory({{$category->id  }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger text-white">Delete</a>
                        </td>
                      </tr>
                    @endforeach                
                  
                </tbody>
              </table>
              <div>
                  {{ $categories->links() }}
              </div>
              </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
  window.addEventListener('close-modal', event => {
    $("#deleteModal").modal('hide');                
});  
</script>

@endpush
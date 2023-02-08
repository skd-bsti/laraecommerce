{{-- Add brand Model --}}
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form wire:submit.prevent="storeBrand" >
        <div class="modal-body">
          <div class="mb-3">
            <label for="">Brand name</label>
            <input type="text" wire:model.defer="name" class="form-control">
            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="mb-3">
            <label for="">Brand Slug</label>
            <input type="text" wire:model.defer="slug" class="form-control">
            @error('slug')<span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="mb-3">
            <label for="">Status</label>
            <input type="checkbox" wire:model.defer="status" >Checked= Hidden, Unchecked=visible
            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
{{-- update modal --}}
  <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
          <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading>
          <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
       
        </div>
      </div>
      <div wire:loading.remove>
        <form wire:submit.prevent="updateBrand" >
        <div class="modal-body">
          <div class="mb-3">
            <label for="">Brand name</label>
            <input type="text" wire:model.defer="name" class="form-control">
            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="mb-3">
            <label for="">Brand Slug</label>
            <input type="text" wire:model.defer="slug" class="form-control">
            @error('slug')<span class="text-danger">{{ $message }}</span>@enderror
          </div>
          <div class="mb-3">
            <label for="">Status</label>
            <input type="checkbox" wire:model.defer="status" style="width: 35px; height:35px;">Checked= Hidden, Unchecked=visible
            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>

  {{-- Delete Brand modal --}}
  <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Modal</h5>
          <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div wire:loading>
          <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
       
        </div>
      </div>
      <div wire:loading.remove>
        <form wire:submit.prevent="destroyBrand" >
        <div class="modal-body">
          <h4>Are you sure to delete Data?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Yes Delete</button>
        </div>
        </form>
      </div>
      </div>
    </div>
  </div>
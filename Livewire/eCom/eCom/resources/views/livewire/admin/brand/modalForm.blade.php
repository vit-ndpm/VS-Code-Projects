<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent='savBrand'>

                    <div class="mb-3">
                        <label for="category">Select Category</label>
                        <select required  wire:model.defer='category_id' class="form-select">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category )
                            <option class="form-select" value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Brand Name</label>
                        <input type="text" wire:model.defer='name' class="form-control">
                        @error('name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" wire:model.defer='slug' class="form-control">
                        @error('slug')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label><br>
                        <input type="checkbox" wire:model.defer='status'><br>
                        <i class="fas fa-info">checked is Hidden Unchecked is visible</i>
                        @error('slug')
                        {{$status}}
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Brand</button>
            </div>
            </form>
        </div>
    </div>
</div>
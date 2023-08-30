<div>
    
    <div  wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent='destroyCategory'>
          <div class="modal-body">
            Are you Sure to Delete Category
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Yes,Delete</button>
          </div>
        </form>

        </div>
      </div>
    </div>
    {{-- The whole world belongs to you. --}}
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>
                id
            </th>
            <th>
                Image
            </th>
            <th>
                name
            </th>
            <th>
                Description
            </th>
            <th>
                status
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @isset($categories)
            @foreach ($categories as $category)
                
            
                <tr>
                    <td>
                        {{$category->id}}
                    </td>
                    <td>
                        <img src="{{asset($category->image)}}" alt="">
                        
                    </td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        {{$category->description}}
                    </td>
                    <td>
                        {{$category->status}}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('admin/category/'.$category->id.'/edit')}}">Edit</a> 
                        <a class="btn btn-danger" wire:click='deleteCategory({{$category->id}})' href="#" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a> 
                    </td>
                </tr>
                @endforeach 
        @endisset
    </tbody>
</table>
<div>
    {{ $categories->links() }}
</div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal', event=>{
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
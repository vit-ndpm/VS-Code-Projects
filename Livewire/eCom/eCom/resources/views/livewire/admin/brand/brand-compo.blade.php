<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @include('livewire.admin.brand.modalForm')
    @include('livewire.admin.brand.modalEditBrand')
    @include('livewire.admin.brand.modalDeleteBrand')
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                 
            </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Brands</h3>
                    <a href="#" class="btn btn-sm btn-success text-light float-end" data-bs-toggle="modal"
                        data-bs-target="#addBrandModal">Add New Brand</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    Category ID
                                </th>
                                <th>
                                    name
                                </th>
                                <th>
                                    slug
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
                            @isset($brands)
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>
                                            {{ $brand->id }}
                                        </td>
                                        <td>
                                            @if ($brand->category)
                                            {{ $brand->category->name }}
                                            @endif
                                            
                                        </td>
                                        <td>
                                            {{ $brand->name }}
                                        </td>
                                        <td>
                                            {{ $brand->slug }}
                                        </td>
                                        <td>
                                            {{ $brand->status == 1 ?'hidden' : 'visible' }}
                                        </td>
                                        <td>
                                            <a href="#" wire:click='editBrand({{ $brand->id }})'
                                                class="btn btn-sm btn-primary text-light" data-bs-toggle="modal"
                                                data-bs-target="#editBrandModal">Edit</a>
                                            <a href="#" wire:click='deleteBrand({{ $brand->id }})'
                                                class="btn btn-sm btn-danger text-light" data-bs-toggle="modal"
                                                data-bs-target="#deleteBrandModal">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endisset

                        </tbody>
                    </table>
                    <div> {{ $brands->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#editBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');

        });
    </script>
@endpush

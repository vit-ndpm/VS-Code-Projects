<div>
    {{-- The whole world belongs to you. --}}
    <div class="table-responsive">
        <table class=" table table-sm  table-responsive table-bordered table-hover">
            <thead>
                <tr>
                    <th>
                        Color Name
                    </th>
                    <th>
                        Quantity
                    </th>
                    
                    <th>
                        delete
                    </th>
                </tr>
            </thead>
            <tbody>
                @isset($productColors)
                @forelse ($productColors as $productColor)
                <tr>
                    <td>
                        {{$productColor->color_id}}
                    </td>
                    <td>
                        <div class="input-group">
                       <input wire:model='quantity[]' class="input-control text-center" type="number"  style="width: 70px;"> 
                   
                        <button class="btn text-light btn-primary ">Update</button>
                    </div>
                    </td>
                    <td>
                        <button class="btn text-light btn-danger ">Delete</button>
                    </td>
                </tr>
                @empty
                    
                @endforelse
                    
                @endisset
                
            </tbody>
        </table>
    </div>
</div>

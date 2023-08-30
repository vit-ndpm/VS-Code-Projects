<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteBrandModal"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBrandModal">Delete Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div  wire:loading class="spinner-border p-2" role="status">
                <span class="sr-only"></span>
                
              </div>
              
            <div class="modal-body" wire:.loading.remove>
                <form wire:submit.prevent='destroyBrand'>

                   <h5 class="text-danger"> Are you Sure ! Delete this Brand ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-light">Yes, Delete Brand</button>
            </div>
            </form>
        </div>
    </div>
</div>

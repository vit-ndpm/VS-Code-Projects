<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class CategoryComponet extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    public function render()
    {
        $categories = Category::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.category.category-componet', ['categories' => $categories]);
    }
    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }
    public function destroyCategory()
    {

        $category=Category::find($this->category_id);
        //dd($category);
        $path='uploads/category/'.$category->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','Category Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
}

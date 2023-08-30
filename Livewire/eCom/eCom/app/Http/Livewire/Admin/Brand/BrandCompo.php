<?php

namespace App\Http\Livewire\Admin\Brand;
use Livewire\WithPagination;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class BrandCompo extends Component
{
    use WithPagination;

    public $name, $slug, $status;
    public $brand_id;
    public $category_id;

    protected $paginationTheme = 'bootstrap';
    public function rules()
    {
        return [

            'name' => 'string|required',
            'slug' => 'string|required',
            'status' => 'nullable',
            'category_id' => 'required|integer',

        ];
    }
    public function resetInput()
    {
        # code...
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
        $this->category_id = NULL;
        

    }
    public function render()
    {
        $categories=Category::where('status',0)->get();       
        $brands=Brand::orderBy('id','ASC')->paginate(10);
        return view('livewire.admin.brand.brand-compo',['categories'=>$categories,'brands'=>$brands])
            ->extends('layouts.admin')
            ->section('content');
    }
    public function savBrand()
    {
        $this->validate();
        //dd($this->category_id,$this->slug,$this->status);
        $brand = Brand::create([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', 'Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function editBrand(int $brand_id){
       $brand=Brand::findOrFail($brand_id);
       $this->name=$brand->name;
       $this->category_id=$brand->category_id;
       $this->slug=$brand->slug;
       $this->status=$brand->status;
       $this->brand_id=$brand_id;
    }
    public function updateBrand()
    {
        $this->validate();
        $brand = Brand::find($this->brand_id)->update([
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' => $this->status ==true ? '1' : '0',
        ]);
        session()->flash('message', 'Brand updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function deleteBrand($brand_id){
        $this->brand_id=$brand_id;
    }
    public function destroyBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'Brand deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
}
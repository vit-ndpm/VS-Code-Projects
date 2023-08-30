<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'long_description' => $validatedData['long_description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request['trending'] == true ? '1' : '0',
            'status' => $request['status'] == true ? '1' : '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keywords' => $validatedData['meta_keywords'],
            'meta_description' => $validatedData['meta_description'],

        ]);
        // insert images to database 
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/product/';
            $i = 1;
            foreach ($request->file('image') as $key => $imageFile) {
                $ext = $imageFile->getClientOriginalExtension();
                $fileName = time() . '_' . $i++ . '.' . $ext;
                $imageFile->move($uploadPath, $fileName);
                $finalImageFilepath = $uploadPath . $fileName;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImageFilepath,
                ]);
            }
        }
        // insert Colors to database 
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,
                ]);
            }
        }


        return redirect('admin/product')->with('message', 'Product Added Successfully');
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $productColors = $product->productColors()->pluck('color_id')->toArray();
      
        $colors = Color::whereNotIn('id',$productColors)->get();
       // return($colors);
        return view('admin.products.edit', compact('categories', 'brands', 'product', 'colors', 'productColors'));
    }
    //remove image function
    public function removeImage($prodImage_id)
    {
        $productImage = ProductImage::where('id', $prodImage_id)->first();
        if ($productImage) {
            if (File::exists($productImage->image)) {
                File::delete($productImage->image);
            }
            $productImage->delete();
            return redirect()->back()->with('message', 'imaage Removed Successfully');
        }
    }
    //update product function
    public function update(ProductRequest $request, $product_id)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->where('id', $product_id)->first();
        $product->update([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'long_description' => $validatedData['long_description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request['trending'] == true ? '1' : '0',
            'status' => $request['status'] == true ? '1' : '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keywords' => $validatedData['meta_keywords'],
            'meta_description' => $validatedData['meta_description'],

        ]);
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/product/';
            $i = 1;
            foreach ($request->file('image') as $key => $imageFile) {

                $ext = $imageFile->getClientOriginalExtension();

                $fileName = time() . '_' . $i++ . '.' . $ext;
                $imageFile->move($uploadPath, $fileName);
                $finalImageFilepath = $uploadPath . $fileName;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImageFilepath,
                ]);
            }
        }
        // insert Colors to database 
        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->colorquantity[$key] ?? 0,
                ]);
            }
        }

        return redirect('admin/product')->with('message', 'Product Updated Successfully');
    }
    // delete product function 
    public function destroy(Product $product)
    {
        if ($product) {
            $productImages = $product->productImages;
            if ($productImages) {
                foreach ($productImages as $key => $productImage) {
                    if ($productImage) {
                        if (File::exists($productImage->image)) {
                            File::delete($productImage->image);
                        }
                        $productImage->delete();
                    }
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
    public function removeProdColorQty($productColor_id)
    {
        $productColor = ProductColor::findOrFail($productColor_id);
        $productColor->delete();
        return redirect()->back()->with('message', 'Product Color and Quantity Removed Successfully');
    }
   

    public function updateProductColorQty(Request $request, $product_color_id)
    {
        $pordColorData=Product::findOrFail($request->prodId)->productColors()->where('id',$product_color_id);
        $pordColorData->update([
            'quantity'=>$request->qty,
        ]);
        
       return response()->json(['message'=>'Quantity Updated']);
    }
}

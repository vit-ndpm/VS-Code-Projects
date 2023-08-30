<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //

    public function index()
    {
        $sliders = Slider::where('status', 0)->get();
        return view('frontend.slider.index', compact('sliders'));
    }
    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }
    public function products($category_slug)
    {
        # code...
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            # code...
            $brands = Brand::where('status', '0')->where('category_id', $category->id)->get();
            $products = $category->products()->get();
            //dd($products);
            return view('frontend.collections.products.index', compact('products', 'brands', 'category'));
        } else {
            return redirect()->back()->with('message', 'No Category Found');
        }
    }
    public function productView($category_slug, $product_slug)
    {
        //dd($product_slug.'---'.$category_slug);
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if ($category) {
            # code...
            $product = Product::where('slug', $product_slug)->where('status', '1')->first();
            if ($product) {
                //return $product;
                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                # code...
                return redirect()->back()->with('message', 'No product Found');
            }
        } else {
            return redirect()->back()->with('message', 'No Category Found');
        }
    }
}

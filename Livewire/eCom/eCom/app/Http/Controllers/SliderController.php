<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }
    public function create(Request $request)
    {
        return view('admin.slider.create');
    }
    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        $slider = new Slider();
        $slider->title = $data['title'];
        $slider->status = $request['status'] ? '1' : '0';
        $slider->description = $data['description'];
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileName = 'slider' . time() . '.' . $ext;
            $uploadPath = 'uploads/sliders/';
            $imageFile->move($uploadPath, $fileName);
            $finalPath = $uploadPath . $fileName;
            $slider->image = $finalPath;
        }
        if ($slider->save()) {
            return redirect('admin/slider')->with('message', 'Slider Added Successfully');
        } else {
            return redirect()->back()->with('message', 'Something went Wrong');
        }
    }
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', ['slider' => $slider]);
    }
    public function update(SliderRequest $request, $slider_id)
    {
        $data = $request->validated();
        $slider =Slider::findOrFail($slider_id);
        $slider->title = $data['title'];
        $slider->status = $request['status'] ? '1' : '0';
        $slider->description = $data['description'];
        if ($request->hasFile('image')) {
            if(File::exists($slider->image))
            {
                File::delete($slider->image);
            }
            $imageFile = $request->file('image');
            $ext = $request->file('image')->getClientOriginalExtension();
            $fileName = 'slider' . time() . '.' . $ext;
            $uploadPath = 'uploads/sliders/';
            $imageFile->move($uploadPath, $fileName);
            $finalPath = $uploadPath . $fileName;
            $slider->image = $finalPath;
        }
        if ($slider->save()) {
            return redirect('admin/slider')->with('message', 'Slider Updated Successfully');
        } else {
            return redirect()->back()->with('message', 'Something went Wrong');
        }
    }
    public function destroy(Slider $slider)
    {
        if(File::exists($slider->image))
        {
            File::delete($slider->image);
        }
       if($slider->delete()) {
        return redirect('admin/slider')->with('message', 'Slider Updated Successfully');
       }
       else {
        return redirect()->back()->with('message', 'Something went Wrong');
    }
    }
}

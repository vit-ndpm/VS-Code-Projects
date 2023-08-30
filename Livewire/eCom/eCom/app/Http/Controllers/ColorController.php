<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\ColorRequest;
use Illuminate\Auth\Events\Validated;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colors=Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.colors.create');

    }

    
    public function store(ColorRequest $request)
    {
        //
         
        $data=$request->validated();
        $data['status']=$request->status==true ?'1':'0';
       Color::create($data);
       return redirect('admin/color')->with('message','Color Added Successfully');
    }
    
       
    public function edit(Color $color)
    {
        //
        
        return view('admin.colors.edit',compact('color'));
    }

    
    public function update(ColorRequest $request, Color $color)
    {
        //

        $data=$request->validated();
        $data['status']=$request->status==true ?'1':'0';
       Color::findOrFail($color->id)->update($data);
       return redirect('admin/color')->with('message','Color Updated Successfully');
    }

    
    public function destroy(Color $color)
    {
        if ($color) {
            $color->delete();
            return redirect('admin/color')->with('message','Color Updated Successfully');

        }
        else{
            return redirect('admin/color')->with('message','Color not found ');

        }
    }
}

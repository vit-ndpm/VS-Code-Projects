<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageUploadController extends Controller
{
    //
    public function save(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'file' => 'required',
        ]);
        if ($request->file('file')) {
            # code...
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'SKC_' . time() . '.' . $ext;
            $file->move(base_path('public\img\uploads'), $file->getClientOriginalName(), $fileName);
            // return Redirect::back()->with(['status' => 'moved successfully']);
            $imageUpload = new ImageUpload();
            $imageUpload->name = $request->name;
            $imageUpload->email = $request->email;
            $imageUpload->mobile = $request->mobile;
            $imageUpload->img = $fileName;
            $imageUpload->save();
            $records = ImageUpload::all();

            return redirect('/', 302, ['data' => $records])->with(['status' => 'Data Saved successfully']);
        }
    }
    public function delete($id = null)
    {
        $result = ImageUpload::find($id);

        if ($result != NULL) {
            $result->delete();
            $records = ImageUpload::all();

            return redirect('/', 302, ['data' => $records])->with('status', 'Deleted Successfully');
        } else {
            $records = ImageUpload::all();

            return  redirect('/', 200, ['data' => $records])->with('status', 'Delete Operation failed');
        }

        return $result;
    }
    public function edit($id = null)
    {
        $result = ImageUpload::find($id);
        return view('edit', ['record' => $result]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'file' => 'required',
        ]);
        if ($request->file('file')) {
            # code...
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'SKC_' . time() . '.' . $ext;
            $file->move(base_path('public\img\uploads'), $file->getClientOriginalName(), $fileName);
            // return Redirect::back()->with(['status' => 'moved successfully']);
            $imageUpload = ImageUpload::find($request->id);
            $imageUpload->name = $request->name;
            $imageUpload->email = $request->email;
            $imageUpload->mobile = $request->mobile;
            $imageUpload->img = $fileName;
            $imageUpload->save();
            $records = ImageUpload::all();

            return redirect('/', 302, ['data' => $records])->with(['status' => 'updates successfully']);;
        }
    }
}

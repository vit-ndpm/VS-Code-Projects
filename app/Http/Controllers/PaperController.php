<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paper;
use App\Imports\PaperImport;
use Maatwebsite\Excel\Facades\Excel;

class PaperController extends Controller
{
    //
    public function paperList()
    {
        $papers = Paper::all();
        return view('admin.papers.listPaper', ['papers' => $papers]);
    }
    public function create()
    {
        return view('admin.papers.addPaper');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'paper_name' => 'required',
            'paper_type' => 'boolean',
            'available' => 'boolean',

        ]);

        Paper::create($data);
        return redirect('paperList')->with('status', 'Added Successfully');
    }
    public function edit($id)
    {
        $paper = Paper::find($id);
        return view('admin.papers.updatePaper', ['paper' => $paper]);
    }

    public function update(Request $request)
    {
        $paper = Paper::find($request->input('id'));

        $data = $request->validate([
            'paper_name' => 'required',
            'paper_type' => 'boolean',
            'available' => 'boolean',
            'id' => 'required'

        ]);
        $paper->paper_name = $data['paper_name'];
        $paper->paper_type = $data['paper_type'];
        $paper->available = $data['available'];
        $paper->save();
        return redirect('paperList')->with('status', 'updated Successfully');
    }
    public function delete($id)
    {
        $paper = Paper::find($id);
        $paper->delete();
        return redirect('paperList')->with('status', 'Deleted Successfully');
    }

    public function showImport()
    {
        return view('admin.papers.importPapers');
    }


    public function importPapers(Request $request)
    {

        //  $file= $request->input('importExcel');
        Excel::import(new PaperImport, $request->file('importExcel'));

        return redirect('paperList')->with('status', 'imported Successfully');
    }
}

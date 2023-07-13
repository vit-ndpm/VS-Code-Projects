<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Imports\SubjectImport;
use Maatwebsite\Excel\Facades\Excel;


class SubjectController extends Controller
{
    //
    public function subjectList()
    {
        $subjects = Subject::all();
        return view('admin.subject.listSubject', ['subjects' => $subjects]);
    }
    public function create()
    {
        return view('admin.subject.addSubject');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            

        ]);

        Subject::create($data);
        return redirect('subjectList')->with('status', 'Added Successfully');
    }
    public function edit($id)
    {
        $subjects = Subject::find($id);
        return view('admin.subject.updateSubjects', ['subjects' => $subjects]);
    }

    public function update(Request $request)
    {
        $subject = Subject::find($request->input('id'));

        $data = $request->validate([
            'name' => 'required',
            
            'id' => 'required'

        ]);
        $subject->name = $data['name'];
        
        $subject->save();
        return redirect('subjectList')->with('status', 'updated Successfully');
    }
    public function delete($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect('subjectList')->with('status', 'Deleted Successfully');
    }

    public function showw()
    {
        return view('admin.subject.importSubject');
    }


    public function importSubjects(Request $request)
    {

        //  $file= $request->input('importExcel');
        Excel::import(new SubjectImport, $request->file('importExcel'));

        return redirect('subjectList')->with('status', 'imported Successfully');
    }
}

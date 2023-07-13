<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topics;
use App\Models\Subject;

use App\Imports\TopicsImport;

use Maatwebsite\Excel\Facades\Excel;

class TopicsController extends Controller
{
    //
    public function TopicList()
    {
        $topics = Topics::all();
        return view('admin.topic.listTopics', ['topics' => $topics]);
    }


    public function create()
    {
        $subjects = Subject::all();
        return view('admin.Topic.addTopic', ['subjects' => $subjects]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'subject_id' => 'required|numeric',
            'name' => 'required',

        ]);

        Topics::create($data);
        return redirect('TopicList')->with('status', 'Added Successfully');
    }
    public function edit($id)
    {
        $subjects = Subject::all();
        $topics = Topics::find($id);
        return view('admin.Topic.updateTopic', ['topics' => $topics,'subjects'=>$subjects]);
    }

    public function update(Request $request)
    {
        $topics = Topics::find($request->input('id'));

        $data = $request->validate([
            'subject_id' => 'required|numeric',
            'name' => 'required',
            'id' => 'required'

        ]);
        $topics->name = $data['name'];
        $topics->subject_id = $data['subject_id'];
        $topics->save();
        return redirect('TopicList')->with('status', 'updated Successfully');
    }
    public function delete($id)
    {
        $topics = Topics::find($id);
        $topics->delete();
        return redirect('TopicList')->with('status', 'Deleted Successfully');
    }

    public function showw()
    {
        return view('admin.Topic.importTopics');
    }


    public function importTopics(Request $request)
    {

        //  $file= $request->input('importExcel');
        Excel::import(new TopicsImport, $request->file('importExcel'));

        return redirect('TopicList')->with('status', 'imported Successfully');
    }
    public function getTopics($id)
    {
        $topics=Topics::where("subject_id","=",$id)->get();
        return $topics;
    }
}

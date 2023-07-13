<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Imports\QuestionImport;
use App\Models\Topics;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Subject;


class QuestionController extends Controller
{
    //
    public function listQuestion($id = null)
    {
        $questions = Question::Join('subjects', 'questions.subject_id', '=', 'subjects.id')
            ->Join('topics', 'questions.topic_id', '=', 'topics.id')
            ->where('questions.paper_id', '=', $id)
            ->get(['questions.*', 'subjects.name as subject', 'topics.name as topic']);
        return view('admin.questions.questionList', ['questions' => $questions, 'paper_id' => $id]);
    }
    public function create($id)
    {
        $subjects = Subject::all();
        $topics = Topics::all();
        return view('admin.questions.addQuestion', ['subjects' => $subjects, 'topics' => $topics, 'paper_id' => $id]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            "question_no" => "required|numeric",
            "question" => "string|required",
            "option1" => "string|required",
            "option2" => "string|required",
            "option3" => "string|required",
            "option4" => "string|required",
            "correct_option" => "required|numeric|max:4",
            "description" => "string",
            "subject_id" => "required|numeric",
            "paper_id" => "required",
            "topic_id" => "required|numeric"
        ]);
        //dd($data);
        $question = new Question();
        $question->paper_id = $request->paper_id;
        $question->question_no = $request->question_no;
        $question->question = $request->question;
        $question->option1 = $request->option1;
        $question->option2 = $request->option2;
        $question->option3 = $request->option3;
        $question->option4 = $request->option4;
        $question->correct_option = $request->correct_option;
        $question->description = $request->description;
        $question->subject_id = $request->subject_id;
        $question->topic_id = $request->topic_id;

        if ($question->save()) {
            return back()->with('status', "Question Added Successfully");
        } else {


            return back()->with('status', 302, "Operation Failed");
        }
    }

    public function edit($id)
    {
        $subjects = Subject::all();
        $topics = Topics::all();
        return view('admin.questions.updateQuestion', ['question' => Question::find($id), 'subjects' => $subjects, 'topics' => $topics]);
    }

    public function update(Request $request)
    {
        // return $request->input();
        $data = $request->validate([
            "question_no" => "required|numeric",
            "question" => "string|required",
            "question_id" => "string|required",
            "option1" => "string|required",
            "option2" => "string|required",
            "option3" => "string|required",
            "option4" => "string|required",
            "correct_option" => "required|numeric|max:4",
            "description" => "string",
            "subject_id" => "required|numeric",
            "paper_id" => "required",
            "topic_id" => "required|numeric"
        ]);
        //dd($data);
        $question = Question::find($request->question_id);
        $question->paper_id = $request->paper_id;
        $question->question_no = $request->question_no;
        $question->question = $request->question;
        $question->option1 = $request->option1;
        $question->option2 = $request->option2;
        $question->option3 = $request->option3;
        $question->option4 = $request->option4;
        $question->correct_option = $request->correct_option;
        $question->description = $request->description;
        $question->subject_id = $request->subject_id;
        $question->topic_id = $request->topic_id;

        if ($question->save()) {
            return back()->with('status', "Question updated Successfully");
        } else {


            return back()->with('status', "Updation Failed");
        }
    }

    public function delete($id)
    {
        $question = Question::find($id);
        if ($question->delete()) {
            return back()->with('status', "Question deleted Successfully");
        } else {


            return back()->with('status', "Deletion Failed");
        }
    }
    public function showw()
    {
        return view('admin.questions.importQuestion');
    }


    public function importQuestion(Request $request)
    {

        //  $file= $request->input('importExcel');
       $res= Excel::import(new QuestionImport, $request->file('importExcel'));
return $res;
    }
}

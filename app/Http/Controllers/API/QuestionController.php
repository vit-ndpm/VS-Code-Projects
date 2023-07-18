<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getAllQuestionByPaperId($paperId)
    {
        try {
            //code...
            $allQuestions = Question::where('paper_id', $paperId)->orderBy('question_no')->get();
            if (count($allQuestions) > 0) {
                return response()->json(['message' => 'Total Question Found in this paper:' . count($allQuestions), 'status' => 'success', 'questions' => $allQuestions]);
            } else {
                return response()->json(['message' => 'no Question Found in this paper', 'status' => 'failed']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'failed']);
        }
    }
    public function getQuestionByQuestionNoAndPaperId($paperId,$questionId)
    {
        try {
            //code...
            $questions = Question::where('paper_id', $paperId)->where('question_no',$questionId)->orderBy('question_no')->get();
            if (count($questions) > 0) {
                return response()->json(['message' => 'Total Question Found in this paper:' . count($questions), 'status' => 'success', 'questions' => $questions]);
            } else {
                return response()->json(['message' => 'no Question Found in this paper', 'status' => 'failed']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'failed']);
        }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class ResponseController extends Controller
{
    public function setResponse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'paper_id' => 'required|numeric',
            'question_id' => 'required|numeric',
            'selected_option' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'status' => 'failed'
            ]);
        } else {


            try {
                $response2 = Response::where('user_id', $request->user_id)->where('paper_id', $request->paper_id)->where('question_id', $request->question_id)->get();
                if (count($response2) > 0) {
                    return response()->json([
                        'message' => 'response already Exist for Given User in Selected Paper and Question Number',
                        'status' => 'failed'
                    ]);
                } else {
                    Response::Create([
                        'user_id' => $request->user_id,
                        'paper_id' => $request->paper_id,
                        'question_id' => $request->question_id,
                        'selected_option' => $request->selected_option,
                    ]);
                    return response()->json([
                        'message' => 'response Saved Successfully',
                        'status' => 'success'
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
            }
        }
    }
    public function updateResponse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'paper_id' => 'required|numeric',
            'question_id' => 'required|numeric',
            'selected_option' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'status' => 'failed'
            ]);
        } else {


            try {
                $response2 = Response::where('user_id', $request->user_id)->where('paper_id', $request->paper_id)->where('question_id', $request->question_id)->first();
                if ($response2) {
                    $response2->selected_option = $request->selected_option;
                    $response2->save();
                    return response()->json([
                        'message' => 'response updated Successfully',
                        'status' => 'success'
                    ]);
                } else {
                    // Response::Create([
                    //     'user_id' => $request->user_id,
                    //     'paper_id' => $request->paper_id,
                    //     'question_id' => $request->question_id,
                    //     'selected_option' => $request->selected_option,
                    // ]);
                    return response()->json([
                        'message' => 'response not found for given Details',
                        'status' => 'Failed'
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
            }
        }
    }

    public function delteResposne(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'paper_id' => 'required|numeric',
            'question_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'status' => 'failed'
            ]);
        } else {


            try {
                $response2 = Response::where('user_id', $request->user_id)->where('paper_id', $request->paper_id)->where('question_id', $request->question_id)->first();
                if ($response2) {
                    $response2->delete();
                    return response()->json([
                        'message' => 'Response Deleted Successfully',
                        'status' => 'success'
                    ]);
                } else {

                    return response()->json([
                        'message' => 'Response Not found in Database',
                        'status' => 'failed'
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
            }
        }
    }
    public function getAllResponse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'paper_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'status' => 'failed'
            ]);
        } else {
            try {
                $responses = Response::where('user_id', $request->user_id)->where("paper_id", $request->paper_id)->get();
                if (count($responses) > 0) {
                    return response()->json(['message' => 'Data fetching succes', 'status' => 'success', 'responses' => $responses]);
                } else {
                    # code...
                }
            } catch (\Exception $e) {
                return response()->json(["message" => $e->getMessage(), "status" => "failed"]);
            }
        }
    }
}

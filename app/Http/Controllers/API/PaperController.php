<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function getPapers(){
        try {
            $papers=Paper::where('available','1')->orderBy('created_at','DESC')->get();
            if (count($papers)>0) {
                # code...
                return response()->json(['papers'=>$papers,'status'=>'success','message'=>'total paper Recieved:'.count($papers)]);

            } else {
                return response()->json(['message'=>"no Paper Found",'status'=>'failed']);
            }
            
        } catch (\Exception $e) {
            return response()->json(['message'=>$e->getMessage(),'status'=>'failed']);
        }
      
    }
    public function getPaperById($id){
        try {
            $papers=Paper::where('available','1')->where('id',$id)->orderBy('created_at','DESC')->get();
            if (count($papers)>0) {
                # code...
                return response()->json(['papers'=>$papers,'status'=>'success','message'=>'total paper Recieved:'.count($papers)]);

            } else {
                # code...
                return response()->json(['message'=>"no Paper Found",'status'=>'failed']);
            }
            
        } catch (\Exception $e) {
            return response()->json(['message'=>$e->getMessage(),'status'=>'failed']);
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use App\EvaluationModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function index(Request $request){
        if($request->segment(2)){
            $checkUser = User::where("id",base64_decode($request->segment(2)))->first();
            if(!$checkUser){
                return redirect(route('employee.index'));
            }
        }
        $evaluationModel = new EvaluationModel();
        if(Auth::user()->can_full_review){
            $evaluationCheck = DB::table("user_answers")->where([
                "given_by"  => Auth::user()->id,
                "user_id"   => base64_decode($request->segment(2))
            ])->whereYear('created_at', date('Y'))->first();
            $questions = $evaluationModel->getQuestions([2]);
            $questions = $evaluationModel->getAllQuestion();
        }elseif(Auth::user()->is_hod){
            $evaluationCheck = DB::table("user_answers")->where([
                "given_by"  => Auth::user()->id,
                "user_id"   => base64_decode($request->segment(2))
            ])->whereYear('created_at', date('Y'))->first();
            $questions = $evaluationModel->getQuestions([2]);
            $questions = $evaluationModel->getQuestions([3]);
        }else{
            if($request->segment(2)){
                $evaluationCheck = DB::table("user_answers")->where([
                    "given_by"  => Auth::user()->id,
                    "user_id"   => base64_decode($request->segment(2))
                ])->whereYear('created_at', date('Y'))->first();
                $questions = $evaluationModel->getQuestions([2]);
            }else{
                $evaluationCheck = DB::table("user_answers")->where([
                    "given_by"  => Auth::user()->id,
                    "user_id"   => Auth::user()->id
                ])->whereYear('created_at', date('Y'))->first();
                $questions = $evaluationModel->getQuestions([1]);
            }
        }

        $data["evaluationCheck"] = $evaluationCheck;
        $data["questions"] = $questions;
        return view('evaluation.index')->with($data);
    }

    public function store(Request $request){
        $evaluationModel = new EvaluationModel();
        $postData = $request->all();
        foreach($postData as $key => $pdata){
            if($key != "_token" && $key != "user_id"){
                DB::table("user_answers")->insert([
                    "given_by"      => Auth::user()->id,
                    "user_id"       => $request->input("user_id"),
                    "question_id"   => $key,
                    "answer"        => $pdata,
                    "created_at"    => date("Y-m-d H:i:s")
                ]);
            }
        }

        return redirect(route('employee.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\EvaluationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function index(Request $request){
        //dd(Auth::user()->employee);
        $evaluationModel = new EvaluationModel();
        if(Auth::user()->can_full_review){
            $questions = $evaluationModel->getAllQuestion();
        }elseif(Auth::user()->is_hod){
            $questions = $evaluationModel->getQuestions([3]);
        }else{
            $questions = $evaluationModel->getQuestions([1,2]);
        }

        $data["questions"] = $questions;
        //dd($data);
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

        return redirect(route('employee.evaluation'));
    }
}

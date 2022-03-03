<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EvaluationModel extends Model
{
    public function getAllQuestion(){
        return DB::table("questions")->get();
    }

    public function getQuestions($type){
        return DB::table("questions")->whereIn("type_id",$type)->get();
    }
}

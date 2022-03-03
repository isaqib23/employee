<?php

use App\Department;
use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    private $departments = [
        "ACCOUNTS DEPT - G.E",
        "ACCOUNTS DEPT- REAL ESTATE",
        "ARCHIVE DEPT",
        "LEASING DEPT",
        "HR DEPT",
        "IT DEPT",
        "LEGAL DEPT",
        "MEP DEPT",
        "Management",
        "PROCUREMENT DEPT"
    ];

    protected $questions = '[{"question":"Quality of work - I complete my work thoroughly and with care, correctly following established process and procedures.","type":1,"type1":"radio"},{"question":"Job Knowledge - I have full understanding of my role and responsibilities in the department. I am an expert in my job field and I perform my responsibilities skillfully.","type":1,"type1":"radio"},{"question":"Goal Accomplishment - I consistently accomplish my individual goals and exceed the teams expectations.","type":1,"type1":"radio"},{"question":"Productivity - I consistently deliver my work to agreed timeframes and specifications. I rarely, if ever, miss a deadline or delay a project.","type":1,"type1":"radio"},{"question":"Commitment - I am committed and passionate about my job and the company.","type":1,"type1":"radio"},{"question":"Please share any additional comments or explanations regarding your feedback","type":1,"type1":"text"},{"question":"How much attention to detail does your coworker have?","type":2,"type1":"radio"},{"question":"How well does your coworker collaborate with other employees?","type":2,"type1":"radio"},{"question":"How professionally does your coworker behave?","type":2,"type1":"radio"},{"question":"How willing is your coworker to admit mistakes?","type":2,"type1":"radio"},{"question":"How well does your coworker communicate with others?","type":2,"type1":"radio"},{"question":"Please share any additional comments or explanations regarding your feedback","type":2,"type1":"text"},{"question":"Performs assigned duties accurately and efficiently within deadlines.","type":3,"type1":"radio"},{"question":"Arranging, ordering and responding to work pressure","type":3,"type1":"radio"},{"question":"Please share any additional comments or explanations regarding your feedback","type":3,"type1":"text"},{"question":"Observing Company Policies and Systems","type":4,"type1":"radio"},{"question":"Attendance","type":4,"type1":"radio"},{"question":"Respecting Others","type":4,"type1":"radio"},{"question":"Appearance and Dress","type":4,"type1":"radio"},{"question":"Personal Behavior","type":4,"type1":"radio"},{"question":"Please share any additional comments or explanations regarding your feedback","type":4,"type1":"text"}]';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        DB::table('departments')->truncate();
        DB::table('question_types')->truncate();
        DB::table('questions')->truncate();
        DB::table('user_answers')->truncate();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employee']);

        DB::table('question_types')->insert(["name" => strtolower("SELF EVALUATION")]);
        DB::table('question_types')->insert(["name" => strtolower("PEER EVALUATION")]);
        DB::table('question_types')->insert(["name" => strtolower("LINE MANAGER EVALUATION")]);
        DB::table('question_types')->insert(["name" => strtolower("HR MANAGER EVALUATION")]);

        foreach($this->departments as $dtp){
            Department::create(['name' => strtolower($dtp)]);
        }

        $questions = json_decode($this->questions);
        foreach($questions as $que){
            DB::table('questions')->insert([
                "type_id"      => $que->type,
                "question_index"   => 0,
                "question"   => $que->question,
                "type"   => $que->type1,
                "options"   => ($que->type == "text") ? null : json_encode(["Excellent","Good","Satisfactory","Fair","Poor"])
            ]);
        }
    }
}

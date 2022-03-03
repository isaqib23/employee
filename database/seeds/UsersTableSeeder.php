<?php

use App\Attendance;
use App\Department;
use \DateTime as DateTime;
use App\Role;
use App\User;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Boolean;

class UsersTableSeeder extends Seeder
{
    private $users = '[{"id":1125,"name":"Abed Al Moeiz Yahya Ibrahim Obead","position":"Accountant","email":"a.obeidat@almawarid.com","password":"Abed","hod":0,"hod_id":1094,"is_admin":0,"dept_id":1},{"id":1039,"name":"Naser Yasser Ghalawenji","position":"Accountant","email":"nasser@almawarid.com","password":"Naser","hod":0,"hod_id":1094,"is_admin":0,"dept_id":1},{"id":1096,"name":"Lady Liviny Mindoza","position":"Cashier","email":"l.mendoza@almawarid.com","password":"Lady","hod":0,"hod_id":1094,"is_admin":0,"dept_id":1},{"id":1109,"name":"Ma. Clarisa Camille Lincuna","position":"Data Entry","email":"c.lincuna@almawarid.com","password":"Ma.","hod":0,"hod_id":1094,"is_admin":0,"dept_id":1},{"id":1130,"name":"Mariel Antone Montenegro","position":"Accountant","email":"m.montenegro@almawarid.com","password":"Mariel","hod":0,"hod_id":1094,"is_admin":0,"dept_id":1},{"id":1147,"name":"Cristian Magnaye Marasigan","position":"Accountant","email":"c.marasigan@almawarid.com","password":"Cristian","hod":0,"hod_id":1094,"is_admin":0,"dept_id":1},{"id":1017,"name":"Navas Aliyarukunju So Aliyarukunju","position":"Cashier","email":"navas@almawarid.com","password":"Navas","hod":0,"hod_id":1028,"is_admin":0,"dept_id":2},{"id":1030,"name":"Muhammed Shameel Aniathur","position":"Cashier","email":"shameel@almawarid.com","password":"Muhammed","hod":0,"hod_id":1028,"is_admin":0,"dept_id":2},{"id":1037,"name":"Safwan Ahmad Nadaf","position":"Collection and Follow-up Officer","email":"safwan@almawarid.com","password":"Safwan","hod":0,"hod_id":1028,"is_admin":0,"dept_id":2},{"id":1052,"name":"Muhammad Jamshad Shoukath","position":"Cashier","email":"jamshad@almawarid.com","password":"Muhammad","hod":0,"hod_id":1028,"is_admin":0,"dept_id":2},{"id":1064,"name":"Mohammad Assem Faeyz Hourieh","position":"Accountant","email":"m.hourieh@almawarid.com","password":"Mohammad","hod":0,"hod_id":1028,"is_admin":0,"dept_id":2},{"id":1070,"name":"Florie Mae Ortiz Labiste","position":"Accountant","email":"florie.labiste@almawarid.com","password":"Florie","hod":0,"hod_id":1028,"is_admin":0,"dept_id":2},{"id":1143,"name":"Madonna Marleen Maglana","position":"Accountant","email":"m.maglana@almawarid.com","password":"Madonna","hod":0,"hod_id":1028,"is_admin":0,"dept_id":2},{"id":1142,"name":"Nestor Marquez Guino","position":"Archive","email":"n.guino@almawarid.com","password":"Nestor","hod":0,"hod_id":1122,"is_admin":0,"dept_id":3},{"id":1103,"name":"Mohammed Aslam Asghar Ali","position":"Archive","email":"Mohammed.Aslam@almawarid.com","password":"Mohammed","hod":0,"hod_id":1122,"is_admin":0,"dept_id":3},{"id":1108,"name":"Candice Villaflor Ramirez","position":"Receptionist","email":"candice@almawarid.com","password":"Candice","hod":0,"hod_id":1040,"is_admin":0,"dept_id":4},{"id":1138,"name":"Neia Lyn Sua","position":"Receptionist","email":"n.sua@almawarid.com","password":"Neia","hod":0,"hod_id":1040,"is_admin":0,"dept_id":4},{"id":1149,"name":"Jenilyn Belano Mendoza","position":"Receptioniest","email":"JenilynBelano@almawarid.com","password":"Jenilyn","hod":0,"hod_id":1040,"is_admin":0,"dept_id":4},{"id":1102,"name":"Mohammed Ismail Veerassery","position":"HR Officer","email":"m.ismayil@almawarid.com","password":"Mohammed","hod":0,"hod_id":1044,"is_admin":0,"dept_id":5},{"id":1106,"name":"Marwa Ammari","position":"Secretary","email":"m.ammari@almawarid.com","password":"Marwa","hod":0,"hod_id":1044,"is_admin":0,"dept_id":5},{"id":1115,"name":"Asif Thanikkat Abdul Rassak","position":"Office Assist cum Driver","email":"a.thanikkat@almawarid.com","password":"Asif","hod":0,"hod_id":1044,"is_admin":0,"dept_id":5},{"id":704,"name":"Joby Joseph Joseph","position":"Camp Boss","email":"JobyJoseph@almawarid.com","password":"Joby","hod":0,"hod_id":1044,"is_admin":0,"dept_id":5},{"id":1133,"name":"Preethy Poulose","position":"HR Assistant","email":"p.poulose@almawarid.com","password":"Preethy","hod":0,"hod_id":1044,"is_admin":0,"dept_id":5},{"id":1047,"name":"Rey Richard Relillas Abuan","position":"IT Support","email":"r.abuan@almawarid.com","password":"Rey","hod":0,"hod_id":1128,"is_admin":0,"dept_id":6},{"id":1095,"name":"James Paul Miranda Jacinto","position":"IT Support","email":"j.jacinto@almawarid.com","password":"James","hod":0,"hod_id":1128,"is_admin":0,"dept_id":6},{"id":1042,"name":"Ahmed Ali Fallahi","position":"Lawyer","email":"a.fallahi@almawarid.com","password":"Ahmed","hod":0,"hod_id":1051,"is_admin":0,"dept_id":7},{"id":1080,"name":"Adnan Abdollah Bazrpash Bazrpash","position":"Lawyer","email":"a.abdullah@almawarid.com","password":"Adnan","hod":0,"hod_id":1051,"is_admin":0,"dept_id":7},{"id":1024,"name":"Ali Ahmad Alkaial","position":"Leasing Executive","email":"ali@almawarid.com","password":"Ali","hod":0,"hod_id":1029,"is_admin":0,"dept_id":4},{"id":1043,"name":"Amaar Ahmad Chami","position":"Leasing Executive","email":"a.shami@almawarid.com","password":"Amaar","hod":0,"hod_id":1029,"is_admin":0,"dept_id":4},{"id":1144,"name":"Ans Jamal Muhammad","position":"Leasing Executive","email":"a.mohammad@almawarid.com","password":"Ans","hod":0,"hod_id":1029,"is_admin":0,"dept_id":4},{"id":1145,"name":"Muhammad Musthafa Kooleri Valiya Peedikayil","position":"Leasing Executive","email":"m.musthafa@almawarid.com","password":"Muhammad","hod":0,"hod_id":1029,"is_admin":0,"dept_id":4},{"id":1046,"name":"Nilsa Mae S Secretaria Baragona","position":"Customer Service","email":"nilsa@almawarid.com","password":"Nilsa","hod":0,"hod_id":1029,"is_admin":0,"dept_id":4},{"id":1026,"name":"Mahmmoud Hatem Alsarag","position":"Accountant","email":"mahmoud@almawarid.com","password":"Mahmmoud","hod":0,"hod_id":1094,"is_admin":0,"dept_id":1},{"id":1121,"name":"Basheer Vengayil","position":"Accountant","email":"b.vengaliyil@almawarid.com","password":"Basheer","hod":0,"hod_id":1094,"is_admin":0,"dept_id":1},{"id":1110,"name":"Ashif Arakkaveetil Yusaf","position":"Mechanical Draughtsman","email":"AshifArakkaveetil@almawarid.com","password":"Ashif","hod":0,"hod_id":1004,"is_admin":0,"dept_id":8},{"id":1117,"name":"Samer Mohamad Bassem El Halabi","position":"Energy Engineer - Maintenance Engineer","email":"SamerMohamad@almawarid.com","password":"Samer","hod":0,"hod_id":1004,"is_admin":0,"dept_id":8},{"id":1124,"name":"Anas Azzam Zen Alabden","position":"Secretary - Archive Officer","email":"mepsecretary@almawarid.com","password":"Anas","hod":0,"hod_id":1004,"is_admin":0,"dept_id":8},{"id":1105,"name":"Wesam Issam Ghazai Gazi","position":"Logistic Operations Executive","email":"wesam@almawarid.com","password":"Wesam","hod":0,"hod_id":1085,"is_admin":0,"dept_id":9},{"id":1119,"name":"Mohammad Kabir Hossain","position":"Rope Access Coordinator","email":"k.hossain@almawarid.com","password":"Mohammad","hod":0,"hod_id":1044,"is_admin":0,"dept_id":5},{"id":1148,"name":"Abd Al Rhman Omar Kakaa","position":"Admin Assistant","email":"AbdAlRhman@almawarid.com","password":"Abd","hod":0,"hod_id":1028,"is_admin":0,"dept_id":2},{"id":1010,"name":"Ahmad Abdul Rahim Alcheikh","position":"Head of local Purchase Department","email":"ahmad@almawarid.com","password":"Ahmad","hod":1,"hod_id":"","is_admin":0,"dept_id":10},{"id":1028,"name":"Adham Abed Alazeez Fattahi","position":"Head of  Accounting Department -Real Estate","email":"adham@almawarid.com","password":"Adham","hod":1,"hod_id":"","is_admin":0,"dept_id":2},{"id":1029,"name":"Basem Issam Ghazi","position":"Head of Tenant Affairs department","email":"basem@almawarid.com","password":"Basem","hod":1,"hod_id":"","is_admin":0,"dept_id":4},{"id":1044,"name":"Ebrahim Ali Fallahi","position":"Administration Manager","email":"e.fallahi@almawarid.com","password":"Ebrahim","hod":1,"hod_id":"","is_admin":1,"dept_id":5},{"id":1094,"name":"Ahmed Khalid Al Khatib","position":"Head of Accounting Department- Contracting","email":"a.alkhatib@almawarid.com","password":"Ahmed","hod":1,"hod_id":"","is_admin":0,"dept_id":1},{"id":1128,"name":"Mohamad Ghiath Samer Farhad Marzouka","position":"Head of IT Depatment","email":"g.marzouka@almawarid.com","password":"Mohamad","hod":1,"hod_id":"","is_admin":0,"dept_id":6},{"id":1051,"name":"Bassel Elsuyufi","position":"Head of Legal Department","email":"b.suyufi@almawarid.com","password":"Bassel","hod":1,"hod_id":"","is_admin":0,"dept_id":7},{"id":1004,"name":"Mohammad Fathi Refat Zain Al Abdeen","position":"Executive Manager for MEP company","email":"m.zain@almawarid.com","password":"Mohammad","hod":1,"hod_id":"","is_admin":0,"dept_id":8},{"id":1040,"name":"Jad Allah Yasser Ghalawnji","position":"Deputy of Tenant Affairs Department","email":"jad@almawarid.com","password":"Jad","hod":1,"hod_id":"","is_admin":0,"dept_id":4},{"id":1122,"name":"Suresh Kumar Madhavan","position":"Archive","email":"s.kumar@almawarid.com","password":"Suresh","hod":1,"hod_id":"","is_admin":0,"dept_id":3},{"id":0,"name":"General Manager","position":"Board","email":"Digital@conceptonline.me","password":"General","hod":1,"hod_id":"","is_admin":1,"dept_id":""},{"id":1085,"name":"Akram Hakim","position":"Executive Manager","email":"a.hakim@almawarid.com","password":"Akram","hod":1,"hod_id":"","is_admin":0,"dept_id":9}]';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        DB::table('employees')->truncate();
        DB::table('attendances')->truncate();
        $employeeRole = Role::where('name', 'employee')->first();
        $adminRole =  Role::where('name', 'admin')->first();

        $admin = User::create([
            'name' => 'Fares Tayyar',
            'email' => 'eng.farestayyar@outlook.com',
            'password' => Hash::make('eng.farestayyar')
        ]);

        $users = json_decode($this->users);
        foreach($users as $user){
            $is_admin = (Boolean) $user->is_admin;
            $is_hod = (Boolean) $user->hod;
            // Create Employee User
            $employee = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'can_full_review' => $is_admin,
                'is_hod' => $is_hod,
                'password' => Hash::make(strtolower($user->password))
            ]);
            $employee->roles()->attach($employeeRole);

            $hod_id = ($user->hod_id == "") ? NULL : $user->hod_id;
            // Create Employee
            $employee = Employee::create([
                'user_id' => $employee->id,
                'emp_id' => $user->id,
                'hod_id'    => $hod_id,
                'first_name' => $user->name,
                'desg' => $user->position,
                'department_id' => $user->dept_id
            ]);
        }
    }
}

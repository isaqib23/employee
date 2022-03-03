<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('emp_id');
            $table->bigInteger('user_id');
            $table->bigInteger('hod_id')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('sex')->nullable();
            $table->string('desg');
            $table->string('department_id');
            $table->dateTime('join_date')->nullable();
            $table->float('salary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

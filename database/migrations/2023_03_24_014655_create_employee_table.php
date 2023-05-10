<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->foreign('usersID')->references('id')->on('users');
            $table->string('employeeName')->unique();
            $table->date('employee_dob');
            $table->integer('NRIC_employee');
            $table->string('gender_employee');
            $table->string('nationality_employee');
            $table->string('race_employee');
            $table->string('marital_employee');
            $table->string('children_employee');
            $table->string('position_employee');
            $table->date('date');
            $table->string('bank_name');
            $table->string('acc_number');
            $table->string('crime_employee');
            $table->string('medical_employee');
            $table->string('emergency_employee');
            $table->string('emergency_name');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('state');
            $table->string('country');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};

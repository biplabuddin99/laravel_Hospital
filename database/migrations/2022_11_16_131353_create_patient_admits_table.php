<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_admits', function (Blueprint $table) {
            $table->increments('admit_id');
         
            // $table->unsignedBigInteger('patient_id')->nullable();
            // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
         
            $table->string('name');
            $table->string('phone');
            $table->string('picture')->nullable();
            $table->string('dob');
            $table->string('gender');
            $table->string('blood');
            $table->string('present_add');
            $table->string('permanent_add')->nullable();
            $table->string('email')->nullable();
            $table->string('admit_date');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('husband_name');
            $table->string('marital_status');
            $table->unsignedBigInteger('doctor_id')->nullable();
			$table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->text('problem');
            $table->unsignedBigInteger('room_category_id')->nullable();
			$table->foreign('room_category_id')->references('id')->on('room_categories')->onDelete('cascade');
            
            $table->unsignedBigInteger('room_list_id')->nullable();
			$table->foreign('room_list_id')->references('id')->on('room_lists')->onDelete('cascade');
            $table->string('guardian');
            $table->string('relation');
            $table->text('emg_condition')->nullable();
            $table->integer('status')->default(1);
            $table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->softDeletes();
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
        Schema::dropIfExists('patient_admits');
    }
};

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
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('husband_name');
            $table->string('marital_status');
            $table->string('doctor_ref');
            $table->text('problem');
            $table->dateTime('admit_date');
            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('room')->onDelete('cascade');
            $table->string('guardian');
            $table->string('relation');
            $table->text('emg_condition');
            $table->integer('status')->default(1);
            $table->integer('created_by');
			$table->integer('updated_by');
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

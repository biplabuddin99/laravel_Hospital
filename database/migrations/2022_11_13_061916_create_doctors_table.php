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
        Schema::create('doctors', function (Blueprint $table) {
			$table->increments('doctor_id');
			$table->integer('employee_id')->unsigned()->nullable();
			$table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
			$table->integer('department_id')->unsigned()->nullable();
			$table->foreign('department_id')->references('id')->on('depertments')->onDelete('cascade');
			$table->integer('designation_id')->unsigned()->nullable();
			$table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
			$table->text('biography');
			$table->string('specialist');
			$table->text('education');
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
        Schema::dropIfExists('doctors');
    }
};

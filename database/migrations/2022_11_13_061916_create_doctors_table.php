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
			$table->integer('employ_id')->unsigned()->nullable();
			$table->foreign('employ_id')->references('employ_id')->on('employ_basic_models')->onDelete('cascade');
			$table->integer('department_id')->unsigned()->nullable();
			$table->foreign('department_id')->references('department_id')->on('department_models')->onDelete('cascade');
			$table->integer('designation_id')->unsigned()->nullable();
			$table->foreign('designation_id')->references('designation_id')->on('designation_models')->onDelete('cascade');
			$table->text('biography');
			$table->string('specialist');
			$table->text('education');
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
        Schema::dropIfExists('doctors');
    }
};

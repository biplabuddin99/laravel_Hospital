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
			$table->id();
			$table->unsignedBigInteger('employee_id')->nullable();
			$table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
			$table->unsignedBigInteger('department_id')->nullable();
			$table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
			$table->unsignedBigInteger('designation_id')->nullable();
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

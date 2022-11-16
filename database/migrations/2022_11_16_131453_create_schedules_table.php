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
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedBigInteger('employee_id')->nullable();
			$table->foreign('employee_id')->references('id')->on('employ')->onDelete('cascade');
			$table->unsignedBigInteger('day_id')->nullable();
			$table->foreign('day_id')->references('id')->on('days')->onDelete('cascade');
			$table->unsignedBigInteger('shift_id')->nullable();
			$table->foreign('shift_id')->references('day_id')->on('shift')->onDelete('cascade');
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
        Schema::dropIfExists('schedules');
    }
};

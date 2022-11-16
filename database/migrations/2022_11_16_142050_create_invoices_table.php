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
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedBigInteger('patient_id')->nullable();
			$table->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
			$table->text('description');
			$table->dateTime('payment_date');
			$table->double('payment_amount');
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
        Schema::dropIfExists('invoices');
    }
};

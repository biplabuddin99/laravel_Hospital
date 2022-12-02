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
        Schema::create('invoice_test_details', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('invoice_test_id')->nullable();
			$table->foreign('invoice_test_id')->references('id')->on('invoice_tests')->onDelete('cascade');
			$table->unsignedBigInteger('test_id')->nullable();
			$table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
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
        Schema::dropIfExists('invoice_test_details');
    }
};

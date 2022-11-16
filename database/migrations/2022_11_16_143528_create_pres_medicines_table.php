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
        Schema::create('pres_medicines', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedBigInteger('prescription_id')->nullable();
			$table->foreign('prescription_id')->references('id')->on('prescription')->onDelete('cascade');
			$table->string('name');
			$table->string('type');
			$table->string('dose');
			$table->string('note');
			$table->integer('duration');
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
        Schema::dropIfExists('pres_medicines');
    }
};

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
        Schema::create('prescription_medicines', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('prescription_id')->unsigned()->nullable();
			$table->foreign('prescription_id')->references('id')->on('prescription')->onDelete('cascade');
			$table->string('medi_name');
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
        Schema::dropIfExists('prescription_medicines');
    }
};

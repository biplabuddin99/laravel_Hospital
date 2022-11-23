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
        Schema::create('room_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_category_id')->nullable();
			$table->foreign('room_category_id')->references('id')->on('room_categories')->onDelete('cascade');
			$table->integer('room_no');
			$table->integer('floor_no');
			$table->text('description');
			$table->integer('capacity');
			$table->double('price');
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
        Schema::dropIfExists('room_lists');
    }
};

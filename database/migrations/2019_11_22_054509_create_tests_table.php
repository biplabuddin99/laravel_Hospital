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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_category_id');
            $table->foreign('test_category_id')->references('id')->on('test_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('price');
            $table->string('description');

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
        Schema::dropIfExists('test_categories');
    }
};

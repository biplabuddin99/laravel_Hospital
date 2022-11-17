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
        Schema::create('shifts', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('start');
                $table->string('end');
                $table->integer('status')->default(1);
                $table->integer('created_by');
                $table->integer('updated_by');
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
        Schema::dropIfExists('shifts');
    }
};

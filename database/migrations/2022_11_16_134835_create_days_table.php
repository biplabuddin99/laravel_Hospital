<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
            DB::table('days')->insert([
                ['name'=>'Saturday'],
                ['name'=>'Sunday'],
                ['name'=>'Monday'],
                ['name'=>'Tuesday'],
                ['name'=>'Wednesday'],
                ['name'=>'Thursday'],
                ['name'=>'Friday']
                
            ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
};

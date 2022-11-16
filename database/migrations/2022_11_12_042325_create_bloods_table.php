<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloods', function (Blueprint $table) {
            $table->id();
            $table->string('blood_name');
            $table->timestamps();
        });

        DB::table('bloods')->insert([
            [
                'blood_name'=>'A+',
                'created_at'=>Carbon::now(),
            ],
            [
                'blood_name'=>'A-',
                'created_at'=>Carbon::now(),
            ],
            [
                'blood_name'=>'AB+',
                'created_at'=>Carbon::now(),
            ],
            [
                'blood_name'=>'AB-',
                'created_at'=>Carbon::now(),
            ],
            [
                'blood_name'=>'B+',
                'created_at'=>Carbon::now(),
            ],
            [
                'blood_name'=>'B-',
                'created_at'=>Carbon::now(),
            ],
            [
                'blood_name'=>'O+',
                'created_at'=>Carbon::now(),
            ],
            [
                'blood_name'=>'O-',
                'created_at'=>Carbon::now(),
            ],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloods');
    }
};

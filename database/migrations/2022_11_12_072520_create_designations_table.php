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
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('desig_name');
			$table->text('desig_des');
			$table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('designations')->insert([
            [
                'desig_name'=>'Professor',
                'desig_des'=>'Teach Chittagong Medical Hospital subjects to undergraduate and graduate students.',
                'created_at'=>Carbon::now(),
            ],
            [
                'desig_name'=>'Asst. Professor',
                'desig_des'=>'Teach Chittagong Medical Hospital subjects to undergraduate and graduate students.',
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
        Schema::dropIfExists('designations');
    }
};

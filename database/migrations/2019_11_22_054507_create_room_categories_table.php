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
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->integer('status')->default(1);
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->softDeletes();
            $table->timestamps();
        });
        DB::table('room_categories')->insert([
            [
                'name'=>'VIP',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'Standard',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'Deluxe Single',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'Luxary Single',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'Double Bedded Room',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'Ac',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'Non-Ac',
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
        Schema::dropIfExists('room_categories');
    }
};

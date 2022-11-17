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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role')->unique()->index();
            $table->string('identify')->index();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('roles')->insert([
            [
                'role'=>'Admin',
                'identify'=>'admin',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'Doctor',
                'identify'=>'doctor',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'Nurse',
                'identify'=>'nurse',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'RECEPTIONIST',
                'identify'=>'receptionist',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'LAB-TECH',
                'identify'=>'labtech',
                'created_at'=>Carbon::now(),
            ],
            [
                'role'=>'Accountant',
                'identify'=>'accountant',
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
        Schema::dropIfExists('roles');
    }
};

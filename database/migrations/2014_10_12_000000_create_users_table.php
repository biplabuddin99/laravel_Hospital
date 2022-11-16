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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('contact_no')->unique();
            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('password');
            $table->string('language')->default('en');
            $table->integer('status')->default(1);
            $table->string('profile_pic')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name'=>'MASUM',
                'contact_no'=>'016',
                'role_id'=>'1',
                'password'=>'eyJpdiI6Ik5VRk1idis0VzlCVVNYOWhBcFVnNkE9PSIsInZhbHVlIjoiZkFBRldXcEVOV1FNbUhiQmhuVDNHUT09IiwibWFjIjoiODk2NjY3MTY5M2U0OTEwOWI0YmQ3M2Y2ZDY5MTNkYTMxZDkxMDg5YWU4ZWFhMzhmODZjYTI5MDE4ODhkY2Y2MSIsInRhZyI6IiJ9',
            ],
            [
                'name'=>'BIPLAB',
                'contact_no'=>'015',
                'role_id'=>'1',
                'password'=>'eyJpdiI6Ik5VRk1idis0VzlCVVNYOWhBcFVnNkE9PSIsInZhbHVlIjoiZkFBRldXcEVOV1FNbUhiQmhuVDNHUT09IiwibWFjIjoiODk2NjY3MTY5M2U0OTEwOWI0YmQ3M2Y2ZDY5MTNkYTMxZDkxMDg5YWU4ZWFhMzhmODZjYTI5MDE4ODhkY2Y2MSIsInRhZyI6IiJ9',
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
        Schema::dropIfExists('users');
    }
};

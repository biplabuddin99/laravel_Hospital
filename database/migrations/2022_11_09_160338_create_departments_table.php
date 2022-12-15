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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->SoftDeletes();
        });
        DB::table('departments')->insert([
            [
                'name'=>'CARDIOLOGY',
                'description'=>'The Department of Cardiology provides a broad range of services in the diagnosis and management of h...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'UROLOGY',
                'description'=>'The Department of Urology at Bangladesh Specialized Hospital is dedicated to providing state-of-the-...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'ONCOLOGY',
                'description'=>'The Department of Oncology integrates health care personnel & diagnostic facilities in an environment .....',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'GASTROENTEROLOGY',
                'description'=>'Department of Gastroenterology &amp; Hepatology is devoted to the clinical care of patients with gas..',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'NEPHROLOGY',
                'description'=>'The Department of Nephrology of Bangladesh Specialized Hospital is a leading kidney disease related ...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'DERMATOLOGY',
                'description'=>'The mission of the Department of Dermatology at Bangladesh Specialized Hospital is to provide superi...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'ENT, HEAD & NECK SURGERY',
                'description'=>'ENT Department of Bangladesh Specialized Hospital offers comprehensive treatment for a wide range of...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'NEUROSURGERY',
                'description'=>'Neurosurgery is the surgical specialty concerned with diagnosis, treatment and rehabilitation of pat...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'PSYCHIATRY',
                'description'=>'The Department of Psychiatry at Bangladesh Specialized Hospital, treats adults and children with men...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'DENTAL',
                'description'=>'Bangladesh Specialized Hospital Oral and Maxillofacial Surgery Clinic are dedicated to ensuring indi...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'EMERGENCY',
                'description'=>'Here for you 24 hours a day 7 days a weekIf you need to reach someone in the Emergency room, please ...',
                'created_at'=>Carbon::now(),
            ],
            [
                'name'=>'ICU',
                'description'=>'The department of intensive care in Bangladesh Specialized Hospital is a well-equipped one with all ...',
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
        Schema::dropIfExists('departments');
    }
};

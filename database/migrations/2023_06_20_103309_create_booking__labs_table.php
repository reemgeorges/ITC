<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_labs', function (Blueprint $table) {
            $table->id();
            $table->string('booking_lab_name');
            $table->string('booking_lab_father_name');
            $table->string('booking_lab_age');
            $table->tinyInteger('booking_lab_gender')->comment('0->man,1->woman');
            $table->string('name_analysis');
            $table->unsignedBigInteger('lab_id');
            $table->unsignedBigInteger('doctor_lab_id');
            $table->tinyInteger('status_booking_lab')->default(0)->comment('1->approve,0->not approve');
            $table->tinyInteger('review_lab')->default(0)->comment('0->not, 1->yes');
            $table->unsignedBigInteger('user_id');
            $table->datetime('booking_datetime')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('booking_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->foreign('doctor_lab_id')->references('id')->on('doctor_labs');
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_labs');
    }
};

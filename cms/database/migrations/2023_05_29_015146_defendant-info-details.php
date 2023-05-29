<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DefendantInfoDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defendantInfo', function (Blueprint $table) {
        $table->id();  
            
            $table->string('case_id');
            $table->string('defendant_id');
            $table->string('section')->nullable();
            $table->string('court_id')->nullable();
            $table->string('is_present')->default('N');
            $table->string('order')->default('N');
             $table->string('orderForstatus')->nullable();
            $table->string('hearingDate_id')->default('N');
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
        //
    }
}

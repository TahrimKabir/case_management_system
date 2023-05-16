<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Criminal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal', function (Blueprint $table) {
            $table->id();
            $table->string('case_id');
            $table->string('criminal')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('address')->nullable();
            
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

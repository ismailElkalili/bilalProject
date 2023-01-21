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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_birth');
            $table->bigInteger('phone_number');
            $table->bigInteger('whatsapp_number');
            $table->string('nation_id');
            $table->string('specialization')->nullable();
            $table->string('qualification')->nullable();
            $table->unsignedBigInteger('committees_id')->nullable();
            $table->timestamps();
            //Add Foreign Key
            $table->foreign('committees_id')->references('id')->on('committees')->nullOnDelete();
        });

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};

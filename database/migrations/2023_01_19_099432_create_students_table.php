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
        Schema::create('students', function (Blueprint $table) {

            // 'id' BIGINT UNSIGED NOT UNN AUTO_INCERMENT PRIMARY
            // $table->bigInteger('id')->unsigned()-autoIncrement()->primary();
            // $table->unsignedBigInteger('id')->autoIncrement()->primary();
            // $table->bigIncrements('id')->primary();
            $table->id();
            //All in the above is same
            $table->string('name');
            $table->boolean('state');

            $table->unsignedBigInteger('dapartment_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->bigInteger('nation_id');
            $table->date('date_of_birth');
            $table->bigInteger('phone_number');
            $table->string('address')->nullable();
            $table->bigInteger('whatsapp_number');
            $table->string('father_job')->nullable();
            $table->string('nationality')->nullable();

            //'created_at' TIMESTIPM NULL
            //'updated_at' TIMESTIPM NULL
            $table->timestamps();

            $table->foreign('dapartment_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('class_id')->references('id')->on('classes')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};

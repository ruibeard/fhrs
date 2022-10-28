<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     *
     *
     *
     *
     *
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->integer('FHRSID')->unique()->nullable();
            $table->string('LocalAuthorityBusinessID')->nullable();
            $table->string('BusinessName')->nullable();
            $table->integer('BusinessTypeID')->nullable();
            $table->string('AddressLine1')->nullable();
            $table->string('AddressLine2')->nullable();
            $table->string('AddressLine3')->nullable();
            $table->string('AddressLine4')->nullable();
            $table->string('Phone')->nullable();
            $table->string('PostCode')->nullable();
            $table->string('RatingValue')->nullable();
            $table->string('RatingDate')->nullable();
            $table->string('LocalAuthorityName')->nullable();
            $table->unsignedTinyInteger('Hygiene')->nullable();
            $table->unsignedTinyInteger('Structural')->nullable();
            $table->unsignedTinyInteger('ConfidenceInManagement')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('establishments');
    }
};

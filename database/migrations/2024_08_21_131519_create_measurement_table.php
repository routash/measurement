<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementTable extends Migration
{
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();  
            $table->json('details');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('measurements');
    }
}


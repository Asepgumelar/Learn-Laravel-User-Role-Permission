<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIfusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('ifus', function (Blueprint $table) {
        //     $table->id();
        //     $table->binary('data');
        //     $table->boolean('confirmed');
        //     $table->ipAddress('visitor');
        //     $table->macAddress('device');
        //     $table->json('option');
        //     $table->nullableTimestamps(0);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('ifus');
    }
}

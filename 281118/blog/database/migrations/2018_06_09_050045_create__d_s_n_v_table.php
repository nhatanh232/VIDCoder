<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDSNVTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DSNV', function (Blueprint $table) {
             $table->increments('id');
            $table->string('Manv')->unique();
            $table->string('Hoten');
            $table->string('Phongban');
            $table->string('Congty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('DSNV', function (Blueprint $table) {
              Schema::dropIfExists('DSNV');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranKursusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_kursuses', function (Blueprint $table) {
            $table->increments('pendaftaran_id');
            $table->integer('user_id');
            $table->integer('kursus_id');
            $table->string('status', 20)->default('Menunggu Konfirmasi');
            $table->string('foto_krs', 50);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftaran_kursuses');
    }
}

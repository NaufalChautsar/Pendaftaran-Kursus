<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('admin_id');
            $table->string('nama', 32);
            $table->string('email', 50)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}

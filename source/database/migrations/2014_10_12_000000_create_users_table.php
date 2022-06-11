<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('username');
            $table->string('fullname')->nullable();
            $table->string('email')->unique();
            $table->integer('age');
            $table->string('gender', 20);
            $table->string('avatar')->default('https://res.cloudinary.com/dswt194ko/image/upload/v1654941498/logo-ute_j2d7ah.png?fbclid=IwAR2v_bhN_Kc-AmTUdHRz5q0FEZJTCAM1WBq3Dnxw0NXU-o4ZbGYY_HYx_3A');
            $table->string('description')->nullable();
            $table->string('facebook')->nullable();
            $table->integer('role')->default(0);
            $table->integer('coins')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

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
        Schema::table('videos', function (Blueprint $table) {
            //
            $table->string('type', 20)->default('PUBLIC');
            $table->integer('share_user_id')->nullable();
            $table->integer('share_video_id')->nullable();
            $table->string('share_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            //
            $table->dropColumn('type');
            $table->dropColumn('share_user_id');
            $table->dropColumn('share_video_id');
            $table->dropColumn('share_description');
        });
    }
};

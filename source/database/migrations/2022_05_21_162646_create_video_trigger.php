<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("CREATE TRIGGER handle_video_action AFTER INSERT ON videos FOR EACH ROW
                        BEGIN
                        DECLARE v_cv INTEGER;
                        DECLARE v_quota INTEGER;
                        DECLARE v_amount INTEGER;
                        DECLARE v_user_id INTEGER;
                        SET v_user_id = NEW.user_id;
                        SELECT COUNT(*) INTO v_cv FROM videos where user_id = v_user_id;
                        SELECT amount, quota INTO v_amount, v_quota FROM rule_coins where code = 'UPLOAD';
                        IF v_cv != 0 THEN
                            IF v_cv % v_quota = 0 THEN
                                UPDATE users SET coin = coin + v_amount WHERE id = v_user_id;
                            END IF;
                        END IF;
                        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS handle_video_action');
    }
};

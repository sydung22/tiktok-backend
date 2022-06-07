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
        DB::unprepared("CREATE TRIGGER handle_video_create_action AFTER INSERT ON videos FOR EACH ROW
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
                                IF NEW.type = 'SHARE' THEN
                                    UPDATE users SET coins = coins + v_amount WHERE id = NEW.share_user_id;
                                ELSE
                                    UPDATE users SET coins = coins + v_amount WHERE id = v_user_id;
                                END IF;
                            END IF;
                        END IF;
                        END");

        DB::unprepared("CREATE PROCEDURE handle_video_report_delete_action(IN var_code_action VARCHAR(255), IN var_user_of_video_id INTEGER)
                        BEGIN
                        DECLARE v_cr INTEGER;
                        DECLARE v_user_coins INTEGER;
                        DECLARE v_quota INTEGER;
                        DECLARE v_amount INTEGER;
                        SELECT COUNT(*) INTO v_cr FROM reports where user_id = var_user_of_video_id;
                        SELECT coins INTO v_user_coins FROM users where id = var_user_of_video_id;
                        SELECT amount, quota INTO v_amount, v_quota FROM rule_coins where code = var_code_action;
                        IF v_user_coins >= v_amount THEN
                            IF v_cr % v_quota = 0 THEN
                                UPDATE users SET coins = coins - v_amount WHERE id = var_user_of_video_id;
                            END IF;
                        ELSE
                            UPDATE users SET coins = 0 WHERE id = var_user_of_video_id;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS handle_video_report_delete_action');
    }
};

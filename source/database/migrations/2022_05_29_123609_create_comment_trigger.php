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
        DB::unprepared("CREATE TRIGGER handle_comment_create_action AFTER INSERT ON comments FOR EACH ROW
                        BEGIN
                        DECLARE v_cm INTEGER;
                        DECLARE v_quota INTEGER;
                        DECLARE v_amount INTEGER;
                        DECLARE v_user_id INTEGER;
                        SET v_user_id = NEW.user_id;
                        SELECT COUNT(*) INTO v_cm FROM comments where user_id = v_user_id;
                        SELECT amount, quota INTO v_amount, v_quota FROM rule_coins where code = 'COMMENT';
                        IF v_cm != 0 THEN
                            IF v_cm % v_quota = 0 THEN
                                UPDATE users SET coins = coins + v_amount WHERE id = v_user_id;
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
        DB::unprepared('DROP TRIGGER IF EXISTS handle_comment_create_action');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = 'INSERT INTO users (id,first_name,last_name,balance,google_id,vkontakte_id,email,email_verified_at,password,csrf_token,remember_token,status,deleted,created_at,updated_at)
        VALUES(9999,"admin","admin",0,"","","admin@admin.com",now(),"$2y$10$qA2iEYRWgKmP9FDqNDH4bugzJKywgTFDkuYs/GRZ.ZFSYkZERhTqi","","",1,0,now(),now());';
        DB::statement($sql);
        $sql = 'INSERT INTO user_infos (user_id)VALUES(9999);';
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = 'delete from users where id = 9999';
        DB::statement($sql);
        $sql = 'delete from user_infos where user_id = 9999';
        DB::statement($sql);

    }
}

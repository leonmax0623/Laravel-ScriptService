<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class City extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "create table city
                (
                    city_id int auto_increment,
                    city_name varchar(255) not null,
                    constraint city_pk
                        primary key (city_id)
                )";
        DB::statement($sql);
        DB::statement("alter table users add city int null");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('city');
        });
    }
}

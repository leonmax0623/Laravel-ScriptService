<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_company', function (Blueprint $table) {
            $table->increments('user_id');
            $table->bigInteger('inn')->nullable();
            $table->string('name',500)->nullable();
            $table->string('full_name',1000)->nullable();
            $table->bigInteger('ogrn')->nullable();
            $table->bigInteger('kpp')->nullable();
            $table->string('legal_address',5000)->nullable();
            $table->string('actual_address',5000)->nullable();
            $table->timestamp('date_create')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_company');
    }
}

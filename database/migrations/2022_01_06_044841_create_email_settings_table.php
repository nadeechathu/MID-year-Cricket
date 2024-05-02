<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_settings', function (Blueprint $table) {

            $table->id();
            $table->string('mailer');
            $table->string('host');
            $table->string('port');
            $table->string('username');
            $table->string('password');
            $table->string('encryption');
            $table->string('from_address');
            $table->string('from_name');
            $table->integer('status')->comment("0 => inactive, 1 => active")->default(0);
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
        Schema::dropIfExists('email_settings');
    }
}

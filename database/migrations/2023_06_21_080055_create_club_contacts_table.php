<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('club_name');
            $table->string('competition_type');
            $table->integer('number_of_teams');
            $table->string('contact_person');
            $table->string('contact_phone');
            $table->string('executive_name');
            $table->string('designation');
            $table->string('executive_phone');
            $table->integer('status')->default(1)->comment("0 => inactive, 1 => active");
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
        Schema::dropIfExists('club_contacts');
    }
}

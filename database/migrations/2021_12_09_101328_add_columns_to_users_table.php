<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->after('email');
            $table->integer('status')->comment("0 => inactive, 1 => active")->after('email');
            $table->string('dob')->nullable()->after('email');
            $table->string('username')->nullable()->after('email');
            $table->string('first_name')->nullable()->after('email');
            $table->string('last_name')->nullable()->after('email');
            $table->string('phone')->nullable()->after('email');            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           
        });
    }
}

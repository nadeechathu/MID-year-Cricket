<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longtext('comment')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('entity')->default(0)->comment("0 => posts, 1 => products");
            $table->integer('entity_id')->nullable();
            $table->integer('status')->default(0)->comment("0 => new, 1 => replied");
            $table->integer('show')->default(0)->comment("0 => no show, 1 => show");
            $table->integer('is_approved')->default(0)->comment("0 => not approved, 1 => approved");
            $table->integer('reply_allowed')->default(1)->comment("0 => replies not allowed, 1 => replies allowed");
            $table->integer('type')->default(0)->comment("0 => comments, 1 => reviews");
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
        Schema::dropIfExists('comments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->longtext('body')->nullable();
            $table->integer('status')->default(0)->comment("0 => draft, 1 => published");
            $table->integer('type')->default(0)->comment("0 => blog, 1 => news");
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('is_approved')->defailt(0)->comment("0 => not approved, 1 => approved");
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
        Schema::dropIfExists('posts');
    }
}

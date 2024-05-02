<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->nullable();
            $table->string('sub_category_name')->nullable();
            $table->string('sub_category_description')->nullable();
            $table->string('slug')->nullable();
            $table->integer('status')->default(1)->comment("0 => inactive, 1 => active");
            $table->string('sub_category_image')->nullable();
            $table->text('canonical_url')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_tag_description')->nullable();
            $table->text('page_title')->nullable();
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
        Schema::dropIfExists('sub_categories');
    }
}

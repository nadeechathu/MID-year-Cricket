<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoColumnsToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('canonical_url')->nullable()->after('category_image');
            $table->text('meta_keywords')->nullable()->after('category_image');
            $table->text('meta_tag_description')->nullable()->after('category_image');
            $table->text('page_title')->nullable()->after('category_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
           $table->dropColumn('canonical_url');
           $table->dropColumn('meta_keywords');
           $table->dropColumn('meta_tag_description');
           $table->dropColumn('page_title');
        });
    }
}

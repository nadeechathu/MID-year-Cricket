<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInPageMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_meta_data', function (Blueprint $table) {
            $table->renameColumn('title', 'page_title');
            $table->renameColumn('meta_description', 'meta_tag_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_meta_data', function (Blueprint $table) {
            $table->renameColumn('page_title', 'title');
            $table->renameColumn('meta_tag_description', 'meta_description');

        });
    }
}

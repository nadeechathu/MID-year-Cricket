<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCanonicalUrlColumnToPageMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_meta_data', function (Blueprint $table) {
            $table->text('canonical_url')->nullable()->after('meta_keywords');
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
            $table->dropColumn('canonical_url');
        });
    }
}

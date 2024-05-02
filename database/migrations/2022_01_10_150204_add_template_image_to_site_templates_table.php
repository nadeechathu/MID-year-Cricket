<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemplateImageToSiteTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_templates', function (Blueprint $table) {
            //


            $table->string('template_image')->nullable()->after('section');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_templates', function (Blueprint $table) {
            //
            $table ->$table->dropColumn('template_image');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnsToImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('caption')->nullable()->after('alt_text');
            $table->string('heading')->nullable()->after('alt_text');
            $table->integer('status')->default(0)->after('alt_text')->comment("0 => no show, 1 => show");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('heading');
            $table->dropColumn('caption');
            $table->dropColumn('status');
        });
    }
}

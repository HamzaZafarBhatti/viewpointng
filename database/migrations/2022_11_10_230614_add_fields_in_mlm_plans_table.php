<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mlm_plans', function (Blueprint $table) {
            //
            $table->integer('upgrade')->default(0);
            $table->integer('ref_percent')->default(0);
            $table->integer('indirect_ref_com')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mlm_plans', function (Blueprint $table) {
            //
            $table->dropColumn('upgrade');
            $table->dropColumn('ref_percent');
            $table->dropColumn('indirect_ref_com');
        });
    }
};

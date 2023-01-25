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
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->integer('required_affliate_refs_prem_eligibility')->default(0);
            $table->integer('required_prem_refs_prem_eligibility')->default(0);
            $table->integer('required_affliate_refs_affliate_eligibility')->default(0);
            $table->integer('required_prem_refs_affliate_eligibility')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->dropColumn('required_affliate_refs_prem_eligibility');
            $table->dropColumn('required_prem_refs_prem_eligibility');
            $table->dropColumn('required_affliate_refs_affliate_eligibility');
            $table->dropColumn('required_prem_refs_affliate_eligibility');
        });
    }
};

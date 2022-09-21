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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('cycle_direct_referrals')->default(0);
            $table->integer('cycle_indirect_referrals')->default(0);
            $table->integer('cycle')->default(0);
            $table->integer('locked_referral')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('cycle_direct_referrals');
            $table->dropColumn('cycle_indirect_referrals');
            $table->dropColumn('cycle');
            $table->dropColumn('locked_referral');
        });
    }
};

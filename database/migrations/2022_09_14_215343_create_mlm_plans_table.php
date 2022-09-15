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
        Schema::create('mlm_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount_balance');
            $table->integer('min_withdraw_balance');
            $table->boolean('status');
            $table->integer('direct_ref_count_cashout');
            $table->integer('indirect_ref_count_cashout');
            $table->string('code_prefix');
            $table->integer('code_length');
            $table->integer('active_period');
            $table->string('image');
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
        Schema::dropIfExists('mlm_plans');
    }
};

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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('percent');
            $table->integer('duration');
            $table->string('period');
            $table->integer('min_deposit');
            $table->integer('amount');
            $table->boolean('status');
            $table->integer('ref_percent');
            $table->string('hashrate');
            $table->string('image');
            $table->string('upgrade');
            $table->string('fb_share_amount');
            $table->integer('indirect_ref_com');
            $table->string('code_prefix');
            $table->integer('code_length');
            $table->integer('active_period');
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
        Schema::dropIfExists('plans');
    }
};

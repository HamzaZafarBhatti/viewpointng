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
        Schema::create('uis', function (Blueprint $table) {
            $table->id();
            $table->text('s6_title');
            $table->text('s7_title');
            $table->text('s8_title');
            $table->text('s8_body');
            $table->text('s7_body');
            $table->string('s7_image');
            $table->text('s6_body');
            $table->text('s5_title');
            $table->text('s5_body');
            $table->text('s4_title');
            $table->text('s4_body');
            $table->string('s4_image');
            $table->text('s3_title');
            $table->text('s3_body');
            $table->string('s3_image');
            $table->text('s2_title');
            $table->text('s2_body');
            $table->string('s2_image');
            $table->text('s1_title');
            $table->text('header_title');
            $table->text('header_body');
            $table->integer('nav_type');
            $table->string('total_assets');
            $table->string('experience');
            $table->string('traders');
            $table->string('countries');
            $table->text('item1_title');
            $table->text('item1_body');
            $table->text('item2_title');
            $table->text('item2_body');
            $table->text('item3_title');
            $table->text('item3_body');
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
        Schema::dropIfExists('uis');
    }
};

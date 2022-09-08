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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('site_name');
            $table->mediumText('site_desc');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->integer('balance_reg')->default(0);
            $table->boolean('email_notify')->default(0);
            $table->boolean('sms_notify')->default(0);
            $table->boolean('email_verification')->default(0);
            $table->boolean('sms_verification')->default(0);
            $table->boolean('registration')->default(1);
            $table->boolean('upgrade_status')->default(1);
            $table->integer('upgrade_fee');
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
        Schema::dropIfExists('settings');
    }
};

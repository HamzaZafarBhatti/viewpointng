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
            $table->string('username');
            $table->string('image')->nullable();
            $table->float('balance');
            $table->string('phone')->nullable();
            $table->boolean('status');
            $table->ipAddress('ip_address');
            $table->dateTime('last_login')->nullable();
            $table->string('pin')->default(000000);
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('sms_code')->nullable();
            $table->boolean('phone_verify');
            $table->boolean('email_verify');
            $table->dateTime('phone_time');
            $table->dateTime('email_time');
            $table->boolean('upgrade')->nullable();
            $table->foreignId('coupon_id');
            $table->foreignId('plan_id');
            $table->foreignId('account_type_id');
            $table->foreignId('bank_id')->nullable();
            $table->string('account_no')->nullable();
            $table->enum('account_type', ['savings', 'current'])->nullable();
            $table->boolean('show_popup')->default(0);
            $table->boolean('is_blocked')->default(0);
            $table->date('activated_at');

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
            $table->dropColumn('username');
            $table->dropColumn('image');
            $table->dropColumn('balance');
            $table->dropColumn('phone');
            $table->dropColumn('country');
            $table->dropColumn('status');
            $table->dropColumn('ip_address');
            $table->dropColumn('last_login');
            $table->dropColumn('pin');
            $table->dropColumn('zip_code');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('verification_code');
            $table->dropColumn('sms_code');
            $table->dropColumn('phone_verify');
            $table->dropColumn('email_verify');
            $table->dropColumn('phone_time');
            $table->dropColumn('email_time');
            $table->dropColumn('upgrade');
            $table->dropColumn('coupon_id');
            $table->dropColumn('plan_id');
            $table->dropColumn('account_type_id');
            $table->dropColumn('bank_id');
            $table->dropColumn('account_no');
            $table->dropColumn('account_type');
            $table->dropColumn('show_popup');
            $table->dropColumn('is_blocked');
            $table->dropColumn('activated_at');
        });
    }
};

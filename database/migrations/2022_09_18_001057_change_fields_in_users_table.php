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
            $table->string('bank_account_no')->nullable();
            $table->enum('bank_account_type', ['savings', 'current'])->nullable();
            $table->dropColumn('account_no');
            $table->dropColumn('account_type');
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
            $table->dropColumn('bank_account_no');
            $table->dropColumn('bank_account_type');
            $table->string('account_no')->nullable();
            $table->enum('account_type', ['savings', 'current'])->nullable();
        });
    }
};

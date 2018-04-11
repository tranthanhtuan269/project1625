<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('big_school_id')->after('email')->nullable();
            $table->unsignedInteger('school3_id')->after('email')->nullable();
            $table->unsignedInteger('school2_id')->after('email')->nullable();
            $table->unsignedInteger('school1_id')->after('email')->nullable();
            $table->unsignedInteger('birth_year')->after('email')->nullable();
            $table->unsignedInteger('birth_month')->after('email')->nullable();
            $table->unsignedInteger('birth_day')->after('email')->nullable();
            $table->unsignedInteger('city_id')->after('email')->nullable();
            $table->unsignedInteger('district_id')->after('email')->nullable();
            $table->unsignedInteger('town_id')->after('email')->nullable();
            $table->string('address')->after('email')->nullable();
            $table->string('avatar')->after('email')->nullable();
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
            $table->dropColumn('avatar');
            $table->dropColumn('address');
            $table->dropColumn('town_id');
            $table->dropColumn('district_id');
            $table->dropColumn('city_id');
            $table->dropColumn('birth_day');
            $table->dropColumn('birth_month');
            $table->dropColumn('birth_year');
            $table->dropColumn('school1_id');
            $table->dropColumn('school2_id');
            $table->dropColumn('school3_id');
            $table->dropColumn('big_school_id');
        });
    }
}

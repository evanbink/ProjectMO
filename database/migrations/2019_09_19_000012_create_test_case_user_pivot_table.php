<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCaseUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('test_case_user', function (Blueprint $table) {
            $table->unsignedInteger('test_case_id');

            $table->foreign('test_case_id', 'test_case_id_fk_352909')->references('id')->on('test_cases')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_352909')->references('id')->on('users')->onDelete('cascade');
        });
    }
}

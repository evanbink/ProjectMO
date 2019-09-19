<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCasesTable extends Migration
{
    public function up()
    {
        Schema::create('test_cases', function (Blueprint $table) {
            $table->increments('id');

            $table->string('test_case');

            $table->string('title');

            $table->string('summary');

            $table->longText('steps');

            $table->string('data')->nullable();

            $table->longText('expected_result');

            $table->string('post_condition');

            $table->longText('actual_result');

            $table->string('status');

            $table->longText('notes')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

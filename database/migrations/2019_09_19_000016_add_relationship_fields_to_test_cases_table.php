<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTestCasesTable extends Migration
{
    public function up()
    {
        Schema::table('test_cases', function (Blueprint $table) {
            $table->unsignedInteger('modified_by_id')->nullable();

            $table->foreign('modified_by_id', 'modified_by_fk_352910')->references('id')->on('users');
        });
    }
}

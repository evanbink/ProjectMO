<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIssuesTable extends Migration
{
    public function up()
    {
        Schema::table('issues', function (Blueprint $table) {
            $table->unsignedInteger('projects_name_id');

            $table->foreign('projects_name_id', 'projects_name_fk_352199')->references('id')->on('time_projects');

            $table->unsignedInteger('testcase_id')->nullable();

            $table->foreign('testcase_id', 'testcase_fk_352749')->references('id')->on('test_cases');

            $table->unsignedInteger('progress_id')->nullable();

            $table->foreign('progress_id', 'progress_fk_352750')->references('id')->on('test_cases');
        });
    }
}

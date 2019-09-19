<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->unsignedInteger('work_type_id')->nullable();

            $table->foreign('work_type_id', 'work_type_fk_352136')->references('id')->on('time_work_types');

            $table->unsignedInteger('project_id')->nullable();

            $table->foreign('project_id', 'project_fk_352137')->references('id')->on('time_projects');

            $table->unsignedInteger('clients_id')->nullable();

            $table->foreign('clients_id', 'clients_fk_352198')->references('id')->on('clients');
        });
    }
}

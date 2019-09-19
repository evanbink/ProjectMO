<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('time_projects', function (Blueprint $table) {
            $table->unsignedInteger('clients_id')->nullable();

            $table->foreign('clients_id', 'clients_fk_352154')->references('id')->on('clients');
        });
    }
}

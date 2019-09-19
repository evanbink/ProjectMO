<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBugsReposTable extends Migration
{
    public function up()
    {
        Schema::table('bugs_repos', function (Blueprint $table) {
            $table->unsignedInteger('related_id')->nullable();

            $table->foreign('related_id', 'related_fk_352205')->references('id')->on('issues');
        });
    }
}

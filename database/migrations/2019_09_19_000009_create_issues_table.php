<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');

            $table->string('desc');

            $table->string('priority');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBugsReposTable extends Migration
{
    public function up()
    {
        Schema::create('bugs_repos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('desc');

            $table->string('cause');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('task_name');

            $table->string('assign_to')->nullable();

            $table->integer('main_days')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

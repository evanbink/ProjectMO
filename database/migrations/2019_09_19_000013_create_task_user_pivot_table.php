<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('task_user', function (Blueprint $table) {
            $table->unsignedInteger('task_id');

            $table->foreign('task_id', 'task_id_fk_356954')->references('id')->on('tasks')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_356954')->references('id')->on('users')->onDelete('cascade');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('email');

            $table->longText('address')->nullable();

            $table->string('contact_person');

            $table->string('contact_number');

            $table->string('status')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}

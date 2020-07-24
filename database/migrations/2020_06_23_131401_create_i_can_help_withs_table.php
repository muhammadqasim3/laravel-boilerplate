<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateICanHelpWithsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_can_help_withs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('problem_name')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('i_can_help_withs');
    }
}

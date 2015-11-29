<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitleMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_m', function (Blueprint $table) {
            $table->increments('ID');
            $table->mediumInteger('movieID')->unsigned();
            $table->mediumInteger('agentID')->unsigned();
            $table->enum('version', ['', 'de', 'us', 'uk', 'fr', 'it', 'es', 'ru']);
            $table->string('title', 255);
            $table->smallInteger('year')->unsigned();
            $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('title_m');
    }
}

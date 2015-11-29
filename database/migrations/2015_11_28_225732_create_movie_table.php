<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie', function (Blueprint $table) {
            $table->increments('ID');
	        $table->mediumInteger('imdbID')->unsigned()->unique();
	        $table->mediumInteger('regUID')->unsigned();
	        $table->timestamp('regDate')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
	        $table->timestamp('lastrated');
	        $table->tinyInteger('genre1')->unsigned();
	        $table->tinyInteger('genre2')->unsigned();
	        $table->tinyInteger('genre3')->unsigned();
	        $table->tinyInteger('genre4')->unsigned();
	        $table->tinyInteger('ratings')->unsigned();
	        $table->double('ratingsavg', 10, 2);
	        $table->mediumInteger('comments')->unsigned();
	        $table->smallInteger('s0')->unsigned();
	        $table->smallInteger('s1')->unsigned();
	        $table->smallInteger('s2')->unsigned();
	        $table->smallInteger('s3')->unsigned();
	        $table->smallInteger('s4')->unsigned();
	        $table->smallInteger('s5')->unsigned();
	        $table->smallInteger('s6')->unsigned();
	        $table->smallInteger('s7')->unsigned();
	        $table->smallInteger('s8')->unsigned();
	        $table->smallInteger('s9')->unsigned();
	        $table->smallInteger('s10')->unsigned();
	        $table->smallInteger('s11')->unsigned();
	        $table->mediumInteger('ori')->unsigned();
	        $table->mediumInteger('de')->unsigned();
	        $table->mediumInteger('us')->unsigned();
	        $table->char('regie', 35);
	        $table->char('actor', 35);
	        $table->enum('image', ['y','n']);
            //$table->timestamps();

            $table->index('ratingsavg');
            $table->index('regDate');
            $table->index('lastrated');
            $table->index('comments');
            $table->index('ratings');
            $table->index('image');
        });

        DB::unprepared("ALTER TABLE  `movie` CHANGE  `imdbID`  `imdbID` INT( 7 ) UNSIGNED ZEROFILL NOT NULL DEFAULT '0000000';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movie');
    }
}

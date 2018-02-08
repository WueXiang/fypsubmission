<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('part');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        DB::table('semesters')->insert(
        [
            'id' => '17181',
            'part' => '1',
            'start_date' => '2017-07-03',
            'end_date'=> '2017-09-24',
        ]);

        DB::table('semesters')->insert(
        [
            'id' => '17182',
            'part' => '2',
            'start_date' => '2017-11-20',
            'end_date'=> '2018-02-18',
        ]);

    }

            

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semesters');
    }

}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFypsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fyps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            // $table->foreign('student_id')->references('id')->on('users');
            $table->integer('title_id')->unsigned();
            // $table->foreign('title_id')->references('id')->on('titles');
            $table->timestamps();
            });

            DB::table('fyps')->insert(
            [
                'id'=> '1011',
                'student_id' => '1133557799',
                'title_id' => '101'
            ]);

            DB::table('fyps')->insert(
            [
                'id'=> '1001',
                'student_id' => '1122334455',
                'title_id' => '100'
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fyps');
    }
}

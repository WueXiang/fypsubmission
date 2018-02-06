<?php


use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class CreateTitlesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('titles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('specialization')->nullable();
            $table->integer('supervisor_id')->unsigned();
            // $table->foreign('supervisor_id')->references('id')->on('lecturers');
            $table->integer('co_supervisor_id')->unsigned()->nullable();
            // $table->foreign('co_supervisor_id')->references('id')->on('lecturers');
            $table->integer('moderator_id')->unsigned()->nullable();
            // $table->foreign('moderator_id')->references('id')->on('lecturers');
            $table->timestamps();
        });
        DB::table('titles')->insert(
        [   
            'id' => '11112222',
            'title' => 'AI killing robot',
            'type' => 'Project',
            'specialization'=> 'GD',
            'supervisor_id' => '1111111111',
            'moderator_id' => '1212121212'
        ]);
        DB::table('titles')->insert(
        [
            'id' => '11113333',
            'title' => 'Music Composer',
            'type' => 'Research',
            'specialization'=> 'SE',
            'supervisor_id' => '1111111111',
            'moderator_id' => '1212121212'
        ]);
        DB::table('titles')->insert(
        [
            'id' => '11114444',
            'title' => 'Emotion Simulator',
            'type' => 'Research',
            'specialization'=> 'DS',
            'supervisor_id' => '1212121212',
            'moderator_id' => '1111111111'
        ]);
        DB::table('titles')->insert(
        [
            'id' => '11115555',
            'title' => 'WiFi Range Extender',
            'type' => 'Project',
            'specialization'=> 'IS',
            'supervisor_id' => '1212121212',
            'moderator_id' => '1111111111'
        ]);

    }


    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('titles');

    }

}

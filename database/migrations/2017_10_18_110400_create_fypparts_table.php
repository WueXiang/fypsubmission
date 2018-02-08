<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFypPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fypparts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fyp_id')->unsigned();
            // $table->foreign('fyp_id')->references('id')->on('fyps');
            $table->integer('part');
            $table->string('supervisor_mark')->nullable();
            $table->string('moderator_mark')->nullable();
            $table->timestamps();
        });

        DB::table('fypparts')->insert(
        [
            'id'=> '10011',
            'fyp_id' => '1001',
            'part' => '1'
        ]);

        DB::table('fypparts')->insert(
        [
            'id'=> '10012',
            'fyp_id' => '1001',
            'part' => '2'
        ]);

        DB::table('fypparts')->insert(
        [
            'id'=> '10111',
            'fyp_id' => '1011',
            'part' => '1'
        ]);

        DB::table('fypparts')->insert(
        [
            'id'=> '10112',
            'fyp_id' => '1011',
            'part' => '2'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fypparts');
    }
}

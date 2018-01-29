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
            'id'=> '11112222',
            'fyp_id' => '11112222',
            'part' => '1'
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

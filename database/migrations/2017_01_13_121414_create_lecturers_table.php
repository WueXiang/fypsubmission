<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
        DB::table('lecturers')->insert(
        [
            'id'=> '1111111111',
            'name' => 'Ng Hu',
            'email' => 'nghu@mmu.edu.my',
            'password'=> Hash::make('123456')
        ]);
        DB::table('lecturers')->insert(
        [
            'id'=> '2222222222',
            'name' => 'John See',
            'email' => 'rotijohn@mmu.edu.my',
            'password'=> Hash::make('123456')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}

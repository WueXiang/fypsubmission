<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('specialization');
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
        DB::table('users')->insert(
        [
            'id'=> '1133557799',
            'name' => 'someone',
            'email' => '1133557799@student.mmu.edu.my',
            'password'=> Hash::make('123456'),
            'specialization' => 'SE'
        ]);

        DB::table('users')->insert(
        [
            'id'=> '1122334455',
            'name' => 'someone_else',
            'email' => '1122334455@student.mmu.edu.my',
            'password'=> Hash::make('123456'),
            'specialization' => 'IS'
        ]);
    }

            

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

}

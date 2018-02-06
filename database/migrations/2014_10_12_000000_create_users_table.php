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
            $table->string('specialization')->nullable();
            $table->boolean('student')->default('0');
            $table->boolean('lecturer')->default('0');
            $table->boolean('admin')->default('0');
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
        DB::table('users')->insert(
        [
            'id'=> '1133557799',
            'name' => 'someone',
            'email' => '1133557799@student.mmu.edu.my',
            'password'=> Hash::make('123456'),
            'specialization' => 'SE',
            'student' => '1',
        ]);

        DB::table('users')->insert(
        [
            'id'=> '1122334455',
            'name' => 'someone_else',
            'email' => '1122334455@student.mmu.edu.my',
            'password'=> Hash::make('123456'),
            'specialization' => 'IS',
            'student' => '1',
        ]);

        DB::table('users')->insert(
        [
            'name' => 'sotong',
            'email' => 'admin@mmu.edu.my',
            'password'=> Hash::make('123456'),
            'admin' => '1',
        ]);

        DB::table('users')->insert(
        [
            'id'=> '1111111111',
            'name' => 'Ng Hu',
            'email' => 'nghu@mmu.edu.my',
            'password'=> Hash::make('123456'),
            'lecturer' => '1',
        ]);

        DB::table('users')->insert(
        [
            'id'=> '1212121212',
            'name' => 'John See',
            'email' => 'rotijohn@mmu.edu.my',
            'password'=> Hash::make('123456'),
            'lecturer' => '1',
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

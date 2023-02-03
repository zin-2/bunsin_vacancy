<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_admin')->nullable();
            $table->string('password')->nullable();
            $table->enum('is_active',['0','1'])->default('0');
            $table->string('photo')->nullable();
            $table->text('skills')->nullable();
            $table->text('languages')->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->string('professional')->nullable();
            $table->string('experience')->nullable();
            $table->string('job_roles')->nullable();
            $table->string('education')->nullable();
            $table->enum('gender', ['male','female','transgender', 'any']);
            $table->string('website')->nullable();
            $table->enum('marital_status', ['single','married']);
            $table->text('bio')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

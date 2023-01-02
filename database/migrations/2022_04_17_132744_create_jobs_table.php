<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->integer('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('province')->onDelete('cascade');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade');
            $table->enum('gender', ['male','female','transgender', 'any']);
            $table->integer('vacancy')->nullable();
            $table->enum('salary_cycle', ['monthly','yearly','weekly', 'daily', 'hourly'])->nullable();
            $table->string('title');
            $table->dateTime('closing_date')->nullable();
            $table->enum('exp_level', ['Trainee', 'Junior Staff', 'Senior Staff','Supervision','Management','Senior Management','Head Department','C Level'])->nullable();
            $table->enum('job_type', ['Full Time', 'Part Time', 'Contract', 'Temporary', 'Commission', 'Internship'])->default('Full Time')->nullable();
            $table->tinyInteger('experience_required_years')->default(0)->nullable(); //In Years
            $table->text('description');
            $table->text('requirement');
            $table->decimal('min_salary',10,2);
            $table->decimal('max_salary',10,2);
            $table->tinyInteger('is_negotiable')->default(0)->nullable();
            $table->boolean('is_urgent')->default(false);
            $table->tinyInteger('status')->default(0)->nullable(); //01:pending,02:approved,09:blocked

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
        Schema::dropIfExists('jobs');
    }
}

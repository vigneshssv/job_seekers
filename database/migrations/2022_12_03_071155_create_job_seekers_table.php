<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->bigInteger('mobile_number')->unique()->nullable();
            $table->string('password')->nullable();
            $table->year('experience_from')->nullable();
            $table->year('experience_to')->nullable();
            $table->integer('experience')->nullable();
            $table->integer('notice_period')->nullable();
            $table->string('skills')->nullable();
            $table->string('city')->nullable();
            $table->string('resume_url')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('status')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('upadted_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_seekers');
    }
}

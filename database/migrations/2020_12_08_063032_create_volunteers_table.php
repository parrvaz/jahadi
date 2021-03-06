<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('name');
            $table->string('profession');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->foreignId('timing_id')->references('id')->on('timings');
            $table->string('picture_url')->nullable();

            $table->string('mobile');
            $table->string('phone')->nullable();
            $table->string('social_media')->nullable();
            $table->string('fax')->nullable();
            $table->text('description')->nullable();
            $table->text('activity_history')->nullable();

            $table->unsignedTinyInteger('public_show')->default(1)->nullable();//0:anything 1:part_1   2:part_1 and 2 3:all(include activities)

            $table->timestamps();
        });


        Schema::create('field_volunteer', function (Blueprint $table) {
            $table->foreignId('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreignId('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade');
            $table->primary(['field_id','volunteer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_volunteer');
        Schema::dropIfExists('volunteers');
    }
}

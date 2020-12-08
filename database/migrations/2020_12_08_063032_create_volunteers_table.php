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
            $table->foreignId('user_id')->nullable()->references('id')->on('users');

            $table->string('name');
            $table->string('profession');
            $table->foreignId('timing_id')->references('id')->on('timings');

            $table->string('mobile');
            $table->string('phone')->nullable();
            $table->string('social_media')->nullable();
            $table->string('fax')->nullable();
            $table->text('activity_history')->nullable();
            $table->text('description')->nullable();
            $table->string('picture_url')->nullable();

            $table->unsignedTinyInteger('public_show')->default(1);//0:anything 1:part_1   2:part_1 and 2 3:all(include activities)

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
        Schema::dropIfExists('volunteers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('state');
            $table->string('city');
            $table->text('description');
            $table->text('address');
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('chanel')->nullable();
            $table->string('social_media')->nullable();
            $table->string('picture_url')->nullable();

            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();

            $table->string('files_url')->nullable();
            $table->boolean('confirmed')->default(0);

            $table->unsignedTinyInteger('public_show')->default(1);//0:anything 1:part_1   2:part_1&part_2

            $table->timestamps();
        });

        Schema::create('volunteer_company', function (Blueprint $table) {
            $table->foreignId('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade');
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->primary(['volunteer_id','company_id']);
        });
        Schema::create('company_field', function (Blueprint $table) {
            $table->foreignId('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->primary(['field_id','company_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteer_company');
        Schema::dropIfExists('company_field');
        Schema::dropIfExists('companies');
    }
}

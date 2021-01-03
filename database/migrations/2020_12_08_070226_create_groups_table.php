<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedTinyInteger('access_level')->default(1);//1:part_1   2:all
            $table->foreignId('owner_company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('group_volunteer', function (Blueprint $table) {
            $table->foreignId('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade');
            $table->foreignId('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->primary(['volunteer_id','group_id']);
        });

        Schema::create('company_group', function (Blueprint $table) {
            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreignId('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->primary(['company_id','group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteer_group');
        Schema::dropIfExists('company_group');
        Schema::dropIfExists('groups');
    }
}

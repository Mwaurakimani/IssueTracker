<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string("subject");
            $table->string("description");
            $table->unsignedBigInteger("priority_id")->default('1');
            $table->unsignedBigInteger("status_id")->default('1');
            $table->unsignedBigInteger("team_id")->default('1');
            $table->unsignedBigInteger("group_id")->default('1');
            $table->unsignedBigInteger("type_id")->default('1');
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
        Schema::dropIfExists('issues');
    }
}

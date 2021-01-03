<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petitions_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('petition_id');
            $table->foreign('petition_id')
                ->references('id')
                ->on('petitions')->onDelete('cascade');
            $table->integer('tag_id');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petitions_tags');
    }
}

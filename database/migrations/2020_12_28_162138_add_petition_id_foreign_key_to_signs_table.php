<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPetitionIdForeignKeyToSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signs', function (Blueprint $table) {
            $table->foreign('petition_id')
                ->references('id')
                ->on('users')
                ->onUpdate('RESTRICT')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signs', function (Blueprint $table) {
            $table->dropForeign('petition_id');
        });
    }
}

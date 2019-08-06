<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOraclePlanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('oracle_plannings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('PLA_CPOINTAG');
            $table->string('PLA_MATRICULE');
            $table->date('PLA_DDEBUT');
            $table->date('PLA_DFIN');
            $table->string('PLA_OBS')->nullable();
            $table->integer('PLA_VALIDE');
            $table->string('PLA_CEMPLOYEUR');
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
        Schema::connection('mysql2')->dropIfExists('oracle_plannings');
    }
}

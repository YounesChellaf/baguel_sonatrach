<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->integer('bloc_id');
            $table->integer('employee_id')->nullable();
            $table->integer('administration_id')->unsigned()->index();
            //$table->foreign('administration_id')->references('id')->on('administrations');
            $table->integer('lifebase_id')->unsigned()->index();
            //$table->foreign('lifebase_id')->references('id')->on('life_bases');
            $table->boolean('reserved')->default(false);
            $table->tinyInteger('active')->default(true);
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
        Schema::dropIfExists('offices');
    }
}

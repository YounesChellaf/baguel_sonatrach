<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('active')->nullable();
            $table->integer('division_id');
            $table->tinyInteger('active')->nullable()->default(true);
            $table->integer('direction_id');
            $table->string('analytic_account', 255)->nullable();
            $table->integer('administration_id')->unsigned()->index();
            $table->foreign('administration_id')->references('id')->on('administrations');
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
        Schema::dropIfExists('services');
    }
}

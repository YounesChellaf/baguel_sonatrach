<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('number');
            $table->boolean('is_vip')->default(false);
            $table->enum('type',['travail','hebergement']);
            $table->integer('floors_number');
            $table->integer('administration_id')->unsigned()->index();
            //$table->foreign('administration_id')->references('id')->on('administrations');
            $table->integer('lifebase_id')->unsigned()->index();
            //$table->foreign('lifebase_id')->references('id')->on('life_bases');
            $table->tinyInteger('active')->nullable()->default(true);
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
        Schema::dropIfExists('blocs');
    }
}

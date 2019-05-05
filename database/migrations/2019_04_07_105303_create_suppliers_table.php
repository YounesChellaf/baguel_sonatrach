<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('suppliers', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->text('comments')->nullable();
      $table->string('display_name');
      $table->string('email')->nullable();
      $table->string('phone')->nullable();
      $table->string('mobile')->nullable();
      $table->text('street')->nullable();
      $table->boolean('active')->default(true);
      $table->integer('created_by')->unsigned()->index();
      $table->integer('last_update_by')->unsigned()->index();
      $table->integer('parent_id')->unsigned()->index()->nullable();
      $table->timestamps();
      //$table->foreign('created_by')->references('id')->on('users');
      //$table->foreign('last_update_by')->references('id')->on('users');
      //$table->foreign('parent_id')->references('id')->on('suppliers');

    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('suppliers');
  }
}

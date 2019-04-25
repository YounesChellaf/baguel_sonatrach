<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('firstName');
      $table->string('lastName');
      $table->string('email')->unique();
      $table->string('username')->unique();
      $table->enum('account_type', ['employee', 'supplier_staff'])->default('employee');
      $table->timestamp('email_verified_at')->nullable();
      $table->integer('department_id')->unsigned()->index();
      $table->string('password')->nullable();
      $table->integer('lifebase_id')->unsigned()->integer()->nullable();
      $table->integer('administration_id')->unsigned()->integer()->nullable();
      $table->rememberToken();
      $table->timestamps();
      $table->timestamp('last_connexion_at')->nullable();
      $table->integer('is_logged_in')->default(false);
      $table->foreign('lifebase_id')->references('id')->on('life_bases');
      $table->boolean('locked')->default(false);
      $table->foreign('administration_id')->references('id')->on('administrations');

    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}

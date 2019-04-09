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
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_connexion_at')->nullable();
            $table->integer('is_logged_in')->default(false);
            $table->foreign('department_id')->references('id')->on('departements')->onDelete('cascade');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sexe');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email')->nullable()->unique();
            $table->text('business_address');
            $table->enum('type', ['employee', 'supplier_staff'])->default('employee');
            $table->text('n_cin')->nullable();
            $table->text('n_passport')->nullable();
            $table->text('marital')->nullable();
            $table->string('employee_number')->unique();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('service_id')->unsigned()->index()->nullable();
            $table->integer('office_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('office_id')->references('id')->on('offices');
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
        Schema::dropIfExists('employees');
    }
}

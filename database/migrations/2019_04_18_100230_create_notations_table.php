<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref', 255)->nullable();
            $table->date('control_date');
            $table->enum('type', ['storage', 'kitchen', 'reception', 'restaurant', 'suppliers', 'rooms', 'office', 'laundry']);
            $table->enum('status', ['draft', 'approved', 'rejected'])->default('draft');
            $table->text('data');
            $table->text('scores');
            $table->float('total_score')->nullable();
            $table->text('comments')->nullable();
            $table->integer('created_by')->unsigned()->integer();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('notations');
    }
}

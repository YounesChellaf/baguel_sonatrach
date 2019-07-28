<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('in_date');
            $table->date('out_date');
            $table->integer('visitor_id');
            $table->integer('created_by');
            $table->integer('last_update_by')->nullable();
            $table->integer('concerned_id');
            $table->string('company_name')->nullable();
            $table->enum('status', ['pending', 'enter_validation','exit_validation', 'rejected'])->default('pending');
            $table->longText('reason');
            //$table->integer('person_count');
            $table->text('remark');
            //$table->integer('request_id');
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
        Schema::dropIfExists('visits');
    }
}

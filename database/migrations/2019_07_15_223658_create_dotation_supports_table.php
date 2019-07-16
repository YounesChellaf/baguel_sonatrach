<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDotationSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dotation_supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_order');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->integer('imputation')->nullable();
            $table->integer('concerned_id');
            $table->enum('status', ['draft', 'approved', 'rejected'])->default('draft');
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
        Schema::dropIfExists('dotation_supports');
    }
}

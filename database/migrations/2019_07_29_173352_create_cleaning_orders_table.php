<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleaningOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('site_id');
            $table->enum('site_type', ['room', 'office']);
            $table->integer('supervisor_id');
            $table->integer('degree');
            $table->date('limit_date');
            $table->date('done_date')->nullable();
            $table->enum('status', ['draft', 'approved', 'rejected','done','in progress'])->default('draft');
            $table->string('remark');
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
        Schema::dropIfExists('cleaning_orders');
    }
}

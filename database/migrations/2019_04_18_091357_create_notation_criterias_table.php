<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotationCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notation_criterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('criteria_key');
            $table->string('criteria_value');
            $table->string('display_name')->nullable();
            $table->enum('criteria_type', ['supplier_notation', 'kitchen_notation', 'laundry_notation', 'rooms_notation', 'storage_notation', 'delivery_notation', 'office_notation', 'restaurant_notation']);
            $table->timestamps();
            $table->integer('created_by')->unsigned()->index();
            $table->integer('last_update_by')->unsigned()->index();
            //$table->foreign('created_by')->references('id')->on('users');
            //$table->foreign('last_update_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notation_criterias');
    }
}

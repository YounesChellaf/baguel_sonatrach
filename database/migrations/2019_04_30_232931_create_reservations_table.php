<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('cible', ['employee', 'visitor']);
            $table->enum('room_type', ['vip', 'ordinaire'])->default('ordinaire');
            $table->integer('room_id');
            $table->date('date_in');
            $table->date('date_out');
            $table->integer('reserver_id');
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('reservations');
    }
}

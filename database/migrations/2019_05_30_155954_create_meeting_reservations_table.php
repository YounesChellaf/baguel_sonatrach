<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('meeting_room_id');
            $table->date('date_reservation');
            $table->time('time_in');
            $table->time('time_out');
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
        Schema::dropIfExists('meeting_reservations');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id');
            $table->string('motif');
            $table->integer('nb_repas');
            $table->date('date_from');
            $table->date('date_to');
            $table->integer('concerned_id');
            $table->integer('employee_id')->nullable();
            $table->integer('imputation');
            $table->string('remark');
            $table->enum('status', ['draft', 'approved', 'rejected'])->default('draft');
            $table->enum('support_duration_type', ['hebergement', 'restauration']);
            $table->enum('support_type', ['vip', 'ordinaire'])->default('ordinaire');
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
        Schema::dropIfExists('visitor_supports');
    }
}

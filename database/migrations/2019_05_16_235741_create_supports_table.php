<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('motif');
            $table->date('date_from');
            $table->date('date_to')->nullable();
            $table->integer('prestation_id');
            $table->integer('imputation')->nullable();
            $table->integer('concerned_id');
            $table->integer('employee_id');
            $table->string('type');
            $table->enum('support_type', ['hebergement', 'restauration'])->nullable();
            $table->enum('support_duration_type', ['vip', 'ordinaire'])->default('ordinaire');
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('supports');
    }
}

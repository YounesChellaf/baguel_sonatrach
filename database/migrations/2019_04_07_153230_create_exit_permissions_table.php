<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExitPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref');
            $table->date('exit_date');
            $table->string('exit_time');
            $table->string('entrance_time')->nullable();
            $table->timestamp('request_validated_at')->nullable();
            $table->text('comments')->nullable();
            $table->enum('status', ['draft', 'approved', 'rejected'])->default('draft');
            $table->enum('exit_reason', ['mission', 'sickness', 'holiday', 'family_urgence']);
            $table->text('other_exit_reason')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->boolean('consumed')->default(false);
            $table->datetime('expire_at')->nullable();
            $table->integer('created_by')->unsigned()->index();
            $table->integer('approved_by')->unsigned()->index();
            $table->integer('last_update_by')->unsigned()->index();
            $table->timestamps();
            /*$table->foreign('created_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
            $table->foreign('last_update_by')->references('id')->on('users');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exit_permissions');
    }
}

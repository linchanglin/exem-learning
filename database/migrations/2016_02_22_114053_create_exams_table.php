<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('examId');
            $table->string('title');
            $table->text('description');
            $table->integer('examTime')->default(0);
            $table->integer('limitTimes')->default(0);
            $table->integer('limitDays')->default(0);
            $table->integer('passScore')->default(0);
            $table->integer('catalog_id')->nullable();
            $table->integer('user_id');
            $table->boolean('ifEmail')->default(true);
            $table->boolean('ifLink')->default(true);
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
        Schema::drop('exams');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->comment('用户id')->nullable();
            $table->float('weight',8,2)->comment('体重')->nullable();
            $table->boolean('breakfast')->comment('早饭')->nullable();
            $table->boolean('lunch')->comment('午饭')->nullable();
            $table->boolean('dinner')->comment('晚饭')->nullable();
            $table->string('remarks')->comment('备注')->nullable();
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
        Schema::dropIfExists('records');
    }
}

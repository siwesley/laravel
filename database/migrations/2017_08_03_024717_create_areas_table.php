<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provinceId')->comment('所属省级id')->nullable();
            $table->string('simpleName')->comment('中文简称')->nullable();
            $table->integer('level')->comment('级别。1为省级，2为市级，3为县级')->nullable();
            $table->string('areaName')->comment('区域名称')->nullable();
            $table->string('areaCode')->comment('区号')->nullable();
            $table->integer('cityId')->comment('所属城市id')->nullable();
            $table->integer('b_id')->comment('本区域id')->nullable();
            $table->integer('parentId')->comment('上级区域id')->nullable();
            $table->string('lon')->comment('本区域经度')->nullable();
            $table->string('lat')->comment('本区域纬度')->nullable();
            $table->string('zipCode')->comment('邮编')->nullable();
            $table->string('wholeName')->comment('完整名称')->nullable();
            $table->string('prePinYin')->comment('区域名称拼音的第一个字母')->nullable();
            $table->string('pinYin')->comment('名称全拼')->nullable();
            $table->string('simplePy')->comment('首字母简拼')->nullable();
            $table->integer('countyId')->comment('区县ID')->nullable();
            $table->string('remark')->comment('备注/说明,一般为空字符串')->nullable();
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
        Schema::dropIfExists('areas');
    }
}

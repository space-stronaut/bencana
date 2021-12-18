<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKorbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_korbans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelaporan_id');
            $table->foreign('pelaporan_id')->references('id')->on('pelaporans')->onDelete('cascade')->onUpdate('cascade');
            $table->char('nik', 20);
            $table->string('nama');
            $table->integer('umur');
            $table->string('kondisi');
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
        Schema::dropIfExists('detail_korbans');
    }
}

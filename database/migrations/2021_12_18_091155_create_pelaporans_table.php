<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('bencana_id');
            $table->foreign('bencana_id')->references('id')->on('bencanas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('kecamatan_id');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade')->onUpdate('cascade');
            $table->date('waktu');
            $table->text('keterangan');
            $table->enum('status', ['proses', 'diverifikasi']);
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
        Schema::dropIfExists('pelaporans');
    }
}

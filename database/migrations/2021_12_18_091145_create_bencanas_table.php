<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBencanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencanas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_bencana_id');
            $table->foreign('kategori_bencana_id')->references('id')->on('kategori_bencanas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_bencana');
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
        Schema::dropIfExists('bencanas');
    }
}

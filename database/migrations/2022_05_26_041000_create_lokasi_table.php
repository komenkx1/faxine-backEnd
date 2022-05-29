<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_masyarakat');
            $table->string("alamat");
            $table->enum("status", ["segera", "selesai"]);
            $table->string("link_google_map")->nullable();
            $table->dateTime("tanggal_mulai");
            $table->dateTime("tanggal_berakhir");
            $table->integer("kapasitas");
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
        Schema::dropIfExists('lokasi');
    }
};

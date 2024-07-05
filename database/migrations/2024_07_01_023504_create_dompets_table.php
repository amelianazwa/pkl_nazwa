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
        Schema::create('dompets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemasukan');
            $table->unsignedBigInteger('id_pengeluaran');
            $table->unsignedBigInteger('id_bank');

            $table->timestamps();
            $table->foreign('id_pemasukan')->references('id')->on('pemasukans')->onDelete('cascade');
            $table->foreign('id_pengeluaran')->references('id')->on('pengeluarans')->onDelete('cascade');
            $table->foreign('id_bank')->references('id')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dompets');
    }
};

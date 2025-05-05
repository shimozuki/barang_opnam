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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->unsignedBigInteger('user_id')->nullable()->constrained();
            $table->unsignedBigInteger('satuan_id')->nullable()->constrained();
            $table->unsignedBigInteger('kategori_id')->nullable()->constrained();
            $table->string('name');
            $table->string('harga');
            $table->string('jumlah');
            $table->string('stock');
            $table->date('tahun');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('satuan_id')->references('id')->on('satuans')->onDelete('CASCADE');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};

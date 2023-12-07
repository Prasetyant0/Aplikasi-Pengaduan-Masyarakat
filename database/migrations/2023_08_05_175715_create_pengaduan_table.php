<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('users_id');
            $table->text('alamat');
            $table->text('deskripsi');
            $table->string('foto_lampiran');
            $table->enum('status', ['New' , 'Proses' , 'Selesai' , 'Di Tolak'])->default('New');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};

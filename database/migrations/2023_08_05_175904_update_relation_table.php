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
        Schema::table('pengaduan', function(Blueprint $table){
            $table->foreign('kategori_id')->references('id_kategori')->on('kategori')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id_users')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tanggapan', function(Blueprint $table){
            $table->foreign('pengaduan_id')->references('id_pengaduan')->on('pengaduan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id_users')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

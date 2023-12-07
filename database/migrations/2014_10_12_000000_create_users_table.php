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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_users');
            $table->bigInteger('NIK')->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->bigInteger('no_telp');
            $table->text('alamat');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('foto_profile');
            $table->enum('role', ['Masyarakat', 'Admin', 'Petugas'])->default('Masyarakat');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

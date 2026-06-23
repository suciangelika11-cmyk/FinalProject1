<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jemaats', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->nullable()
                ->constrained('users')
                ->onDelete('set null');
            $table->unsignedBigInteger('no_kk');
            $table->string('nama_keluarga', 50);
            $table->text('alamat_domisili');
            $table->text('alamat_ktp')->nullable();
            $table->string('nama_lengkap', 50);
            $table->unsignedBigInteger('nik')->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan'
            ])->nullable();
            $table->unsignedBigInteger('handphone')->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->string('status_pernikahan')->nullable();
            $table->enum('status', [
                'pending',
                'confirmed'
            ])->default('pending');
            $table->timestamp('konfirmasi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jemaats');
    }
};
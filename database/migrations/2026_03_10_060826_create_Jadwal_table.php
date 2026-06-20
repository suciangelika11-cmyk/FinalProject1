<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()
                ->constrained('users')->onDelete('set null');
            $table->foreignId('pelayanan_id')->nullable()
                ->constrained('pelayanan')->onDelete('set null');
            $table->string('judul');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai')->nullable();
            $table->string('lokasi')->nullable();
            $table->text('deksripsi')->nullable();
            $table->enum('kategori', ['mingguan', 'acara_khusus']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
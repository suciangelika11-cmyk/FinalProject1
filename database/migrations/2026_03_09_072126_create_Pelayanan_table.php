<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('kategori', ['kepemimpinan', 'tim', 'aksi']);
            $table->string('pemimpim');
            $table->text('deksripsi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelayanan');
    }
};
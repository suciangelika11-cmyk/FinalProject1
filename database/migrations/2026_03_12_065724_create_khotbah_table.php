<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('khotbah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()
                ->constrained('users')->onDelete('set null');
            $table->string('judul');
            $table->string('video');
            $table->text('deksripsi')->nullable();
            $table->string('thumbnail')->nullable();
            $table->date('tanggal_khotbah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khotbah');
    }
};
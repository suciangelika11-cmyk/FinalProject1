<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()
                  ->constrained('users')->onDelete('set null');
            $table->date('tanggal');
            $table->string('pengkhotbah');
            $table->string('tema');
            $table->string('ayat');
            $table->text('worship_team');
            $table->text('multimedia_team');
            $table->text('liturgi_team');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan_pelayanans');
    }
};
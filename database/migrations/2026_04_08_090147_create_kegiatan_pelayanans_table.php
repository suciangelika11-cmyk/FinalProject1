<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->text('tim_singer');
            $table->text('tim_worship_leader');
            $table->text('tim_tamborin');
            $table->text('tim_multimedia');
            $table->text('tim_musik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan_pelayanans');
    }
};
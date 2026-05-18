<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Catatan: kolom username, phone, alamat, jabatan, foto sudah ditambahkan
// di migration 2026_04_18_091135_add_username_to_users_table.php
// Migration ini tidak perlu menambahkan kolom lagi (sudah ada pengecekan)

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Semua kolom admin sudah ditambahkan di migration sebelumnya
            // Tidak ada perubahan tambahan di sini
        });
    }

    public function down(): void
    {
        //
    }
};
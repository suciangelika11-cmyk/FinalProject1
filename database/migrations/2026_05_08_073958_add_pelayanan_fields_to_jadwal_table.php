<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Catatan: Kolom user_id dan pelayanan_id beserta FK-nya sudah ditambahkan
// langsung di 2026_03_10_060826_create_Jadwal_table.php
// Migration ini tidak perlu melakukan perubahan lagi.

return new class extends Migration {
    public function up(): void
    {
        // FK pelayanan_id sudah ada di create_Jadwal_table
    }

    public function down(): void
    {
        //
    }
};
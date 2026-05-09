<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Catatan: Semua foreign key sudah ditambahkan langsung di masing-masing
// migration create_table, sehingga migration ini tidak perlu lagi menambahkan
// kolom/FK secara terpisah. File ini dipertahankan agar urutan migration
// tidak berubah, namun tidak melakukan perubahan apapun.

return new class extends Migration
{
    public function up(): void
    {
        // Semua relasi FK sudah ada di migration masing-masing tabel
    }

    public function down(): void
    {
        //
    }
};
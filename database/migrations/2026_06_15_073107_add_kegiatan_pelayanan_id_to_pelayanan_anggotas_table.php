<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pelayanan_anggotas', function (Blueprint $table) {
            $table->foreignId('kegiatan_pelayan_id')
                ->nullable()
                ->after('pelayanan_id')
                ->constrained('kegiatan_pelayans')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelayanan_anggotas', function (Blueprint $table) {
            //
        });
    }
};

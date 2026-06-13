<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ibadahs', function (Blueprint $table) {
            $table->string('hari')->after('nama_sesi');
        });
    }

    public function down(): void
    {
        Schema::table('ibadahs', function (Blueprint $table) {
            $table->dropColumn('hari');
        });
    }
};
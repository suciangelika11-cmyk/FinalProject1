<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('jemaats') && !Schema::hasColumn('jemaats', 'status_pernikahan')) {
            Schema::table('jemaats', function (Blueprint $table) {
                $table->enum('status_pernikahan', ['Sudah Menikah', 'Belum Menikah'])->nullable()->after('pekerjaan');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('jemaats') && Schema::hasColumn('jemaats', 'status_pernikahan')) {
            Schema::table('jemaats', function (Blueprint $table) {
                $table->dropColumn('status_pernikahan');
            });
        }
    }
};
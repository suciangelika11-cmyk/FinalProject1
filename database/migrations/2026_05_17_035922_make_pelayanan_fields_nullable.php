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
        Schema::table('pelayanan', function (Blueprint $table) {
            $table->string('pemimpim')->nullable()->change();
            $table->text('deksripsi')->nullable()->change();
            $table->string('foto')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pelayanan', function (Blueprint $table) {
            $table->string('pemimpim')->nullable(false)->change();
            $table->text('deksripsi')->nullable(false)->change();
            $table->string('foto')->nullable(false)->change();
        });
    }
};
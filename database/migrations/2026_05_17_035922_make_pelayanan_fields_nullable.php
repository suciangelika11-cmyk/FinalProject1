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
            $table->string('leader')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('photo')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('pelayanan', function (Blueprint $table) {
            $table->string('leader')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
            $table->string('photo')->nullable(false)->change();
        });
    }
};

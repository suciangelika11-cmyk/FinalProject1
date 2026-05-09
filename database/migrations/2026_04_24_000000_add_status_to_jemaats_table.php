<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jemaats', function (Blueprint $table) {
            $table->enum('status', ['pending', 'confirmed'])->default('pending');
            $table->timestamp('confirmed_at')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('jemaats', function (Blueprint $table) {
            $table->dropColumn(['confirmed_at', 'status']);
        });
    }
};
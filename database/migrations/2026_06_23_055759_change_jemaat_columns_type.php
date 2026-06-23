<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jemaats', function (Blueprint $table) {
            $table->unsignedBigInteger('no_kk')->change();
            $table->unsignedBigInteger('nik')->nullable()->change();
            $table->unsignedBigInteger('handphone')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('jemaats', function (Blueprint $table) {
            $table->string('no_kk')->change();
            $table->string('nik')->nullable()->change();
            $table->string('handphone')->nullable()->change();
        });
    }
};

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
        Schema::table('kegiatan_pelayanans', function (Blueprint $table) {

            $table->text('singer_team')->nullable()->after('ayat');
            $table->text('worship_leader_team')->nullable()->after('singer_team');
            $table->text('tamborin_team')->nullable()->after('worship_leader_team');
            $table->text('musik_team')->nullable()->after('multimedia_team');

            $table->dropColumn([
                'worship_team',
                'liturgi_team'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('kegiatan_pelayanans', function (Blueprint $table) {

            $table->text('worship_team')->nullable();
            $table->text('liturgi_team')->nullable();

            $table->dropColumn([
                'singer_team',
                'worship_leader_team',
                'tamborin_team',
                'musik_team'
            ]);
        });
    }
};

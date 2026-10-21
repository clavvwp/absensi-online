<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

public function up(): void
{
    Schema::create('presensi', function (Blueprint $table) {
        $table->id();

        $table->foreignId('siswa_id')
            ->constrained('siswa')
            ->cascadeOnDelete();

        $table->enum('status', ['hadir', 'izin', 'sakit']);

        $table->date('tanggal');

        $table->timestamp('scaned_at')->nullable();

        $table->timestamps();

        // Satu siswa hanya punya satu catatan
        // presensi per tanggal.
        $table->unique(['siswa_id', 'tanggal']);
    });
}

public function down(): void
{
    Schema::dropIfExists('presensi');
}

};

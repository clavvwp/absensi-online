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
    Schema::create('qr', function (Blueprint $table) {
        $table->id();

        $table->foreignId('siswa_id')
            ->unique()
            ->constrained('siswa')
            ->cascadeOnDelete();

        $table->string('qr_token')->unique();

        $table->enum('status', ['aktif', 'nonaktif'])
            ->default('aktif');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('qr');
}

};

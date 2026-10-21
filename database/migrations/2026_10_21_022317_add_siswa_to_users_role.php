<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE users
            MODIFY role ENUM('admin', 'wali_kelas', 'siswa')
            NOT NULL
        ");
    }

    public function down(): void
    {
        DB::table('users')
            ->where('role', 'siswa')
            ->update(['role' => 'wali_kelas']);

        DB::statement("
            ALTER TABLE users
            MODIFY role ENUM('admin', 'wali_kelas')
            NOT NULL
        ");
    }
};

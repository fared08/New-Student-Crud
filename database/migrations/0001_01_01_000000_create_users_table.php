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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('nama', 100)->nullable();                       // Nama lengkap
            $table->string('email')->unique();                // Email (unik)
            $table->text('alamat')->nullable();                         // Alamat lengkap
            $table->boolean('jenis_kelamin')->nullable();                 // 0 = Laki-laki, 1 = Perempuan
            $table->string('agama')->nullable();                          // Agama
            $table->string('sekolah_asal')->nullable();                   // Asal sekolah
            $table->string('password')->nullable();                       // Password hash
            $table->string('role')->default('user');          // Role: user / admin

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

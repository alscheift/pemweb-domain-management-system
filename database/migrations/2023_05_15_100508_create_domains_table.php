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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();

            $table->string('url');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('jenis_aplikasi');

            $table->ipAddress('ip_address');
            $table->integer('port');

            $table->string('processor');
            $table->tinyInteger('jumlah_core_processor');
            $table->string('ram', 8);

            $table->string('jenis_server');
            $table->string('nama_server');
            $table->string('status');
            $table->integer('http_status');

            $table->string('screenshot_url');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};

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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id_notifikasi');
            $table->text('keterangan');
            $table->date('tanggal_notifikasi');
            $table->timestamps();

            $table->foreign('id_domain')->references('id_domain')->on('domains');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['id_domain']);
        });

        Schema::dropIfExists('notifications');
    }
};

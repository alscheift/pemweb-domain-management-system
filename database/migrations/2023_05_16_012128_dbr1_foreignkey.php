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
        Schema::table('domains', function (Blueprint $table) {
            // Foreign Key ke Users('id_user')
            $table->foreignId('user_id')
                ->constrained(table: 'users', column: 'id_user')
                ->onDelete('cascade');

            // Foreign Key ke Units('id_unit')
            $table->foreignId('unit_id')
                ->constrained(table: 'units', column:   'id_unit')
                ->onDelete('cascade');
        });

        Schema::table('solutions', function (Blueprint $table) {
            // Foreign Key ke Notifications('id_notifikasi')
            $table->foreignId('notifikasi_id')
                ->constrained(table: 'notifications', column: 'id_notifikasi')
                ->onDelete('cascade');
        });

        Schema::table('notifications', function (Blueprint $table) {
            // Foreign Key ke Domains('id_domain')
            $table->foreignId('domain_id')
                ->constrained(table: 'domains', column: 'id_domain')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });

        Schema::table('solutions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('notifikasi_id');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropConstrainedForeignId('domain_id');
        });
    }
};

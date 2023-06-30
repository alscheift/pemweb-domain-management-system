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
        Schema::table('users', function (Blueprint $table) {
            // Foreign Key ke Units('id')
            $table->foreignId('unit_id')
                ->nullable()
                ->constrained(table: 'units');
        });

        Schema::table('domains', function (Blueprint $table) {
            // Foreign Key ke Servers('id')
            $table->foreignId('server_id')
                ->constrained(table: 'servers')
                ->onDelete('cascade');
        });

        Schema::table('domain_images', function (Blueprint $table) {
            // Foreign Key ke Domains('id_domain')
            $table->foreignId('domain_id')
                ->constrained(table: 'domains')
                ->onDelete('cascade');
        });

        Schema::table('servers', function (Blueprint $table) {
            // Foreign Key ke Units('id')
            $table->foreignId('unit_id')
                ->constrained(table: 'units')
                ->onDelete('cascade');
        });

        Schema::table('solutions', function (Blueprint $table) {
            // Foreign Key ke Notifications('id_notifications')
            $table->foreignId('notification_id')
                ->constrained(table: 'notifications')
                ->onDelete('cascade');
        });

        Schema::table('notifications', function (Blueprint $table) {
            // Foreign Key ke Domains('id_domain')
            $table->foreignId('domain_id')
                ->constrained(table: 'domains')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('unit_id');
        });

        Schema::table('domains', function (Blueprint $table) {
            $table->dropConstrainedForeignId('server_id');
        });

        Schema::table('domain_images', function (Blueprint $table) {
            $table->dropConstrainedForeignId('domain_id');
        });

        Schema::table('servers', function (Blueprint $table) {
            $table->dropConstrainedForeignId('unit_id');
        });

        Schema::table('solutions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('notification_id');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropConstrainedForeignId('domain_id');
        });
    }
};

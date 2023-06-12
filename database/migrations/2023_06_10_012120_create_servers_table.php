<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('server_type');
            $table->string('status');
            $table->ipAddress('ip_address');

            $table->string('processor');
            $table->tinyInteger('core_processor_count');
            $table->string('ram');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('domains', function (Blueprint $table) {
            // Foreign Key ke Servers('server_id')
            $table->dropConstrainedForeignId('server_id');
        });
        Schema::dropIfExists('servers');


    }
};

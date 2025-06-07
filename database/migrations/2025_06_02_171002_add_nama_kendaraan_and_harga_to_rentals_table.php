<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->string('nama_kendaraan')->nullable()->after('vehicle_id');
            $table->decimal('harga', 15, 2)->nullable()->after('nama_kendaraan');
        });
    }

    public function down(): void
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn(['nama_kendaraan', 'harga']);
        });
    }

};

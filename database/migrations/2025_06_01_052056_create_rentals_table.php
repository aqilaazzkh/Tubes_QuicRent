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
        Schema::create('rentals', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat')->nullable();
            $table->date('tanggal_rental');
            $table->date('tanggal_kembali');
            $table->text('catatan')->nullable();

            $table->unsignedBigInteger('motor_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();


            $table->timestamps();

            $table->foreign('motor_id')->references('id')->on('motor')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};

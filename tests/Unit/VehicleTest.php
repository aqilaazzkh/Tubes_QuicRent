<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Vehicles; // Pastikan nama modelnya adalah 'Vehicles' (jamak)
use App\Models\Rental;

class VehicleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Skenario 1: Memastikan data mobil (vehicle) dapat dibuat.
     * Tes ini sudah BERHASIL.
     */
    #[Test]
    public function a_vehicle_can_be_created()
    {
        $vehicle = Vehicles::create([
            'nama_kendaraan' => 'Toyota Avanza',
            'harga' => 350000,
            'gambar' => 'images/avanza.jpg',
        ]);

        $this->assertDatabaseHas('vehicles', [
            'nama_kendaraan' => 'Toyota Avanza',
        ]);
    }

    /**
     * Skenario 2: Memastikan relasi ke tabel rentals berfungsi.
     */
    #[Test]
    public function a_vehicle_has_many_rentals()
    {
        // 1. Membuat satu data mobil
        $vehicle = Vehicles::create([
            'nama_kendaraan' => 'Daihatsu Xenia',
            'harga' => 350000,
            'gambar' => 'images/xenia.jpg',
        ]);

        // 2. Membuat dua data penyewaan yang berelasi dengan mobil tersebut
        Rental::create([
            'nama' => 'Penyewa Mobil Satu',
            'email' => 'mobil1@example.com',
            'telepon' => '0811111111',
            'tanggal_rental' => now(),
            'tanggal_kembali' => now()->addDay(),
            'vehicle_id' => $vehicle->id,
        ]);

        Rental::create([
            'nama' => 'Penyewa Mobil Dua',
            'email' => 'mobil2@example.com',
            'telepon' => '0822222222',
            'tanggal_rental' => now(),
            'tanggal_kembali' => now()->addDays(2),
            'vehicle_id' => $vehicle->id,
        ]);

        // 3. Memverifikasi relasi
        $this->assertCount(2, $vehicle->rentals);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $vehicle->rentals);
    }
}

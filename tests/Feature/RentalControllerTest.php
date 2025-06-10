<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Motor;
use App\Models\Vehicles;

class RentalControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $motor;
    protected $vehicle;

    protected function setUp(): void
    {
        parent::setUp();

        $this->motor = Motor::create([
            'nama_kendaraan' => 'Honda Beat',
            'harga' => 100000,
            'gambar' => 'image.jpg',
        ]);

        $this->vehicle = Vehicles::create([
            'nama_kendaraan' => 'Toyota Avanza',
            'harga' => 300000,
            'gambar' => 'image.jpg',
        ]);
    }

    #[Test]
    public function rental_is_successful_with_required_fields()
    {
        $rentalData = [
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'telepon' => '081234567890',
            'tanggal_rental' => now()->toDateString(),
            'tanggal_kembali' => now()->addDays(2)->toDateString(),
            'motor_id' => $this->motor->id,
            'alamat' => null, // Opsional
            'catatan' => null, // Opsional
        ];

        
        $response = $this->post('/rent', $rentalData);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('rentals', ['email' => 'budi@example.com']);
    }

    #[Test]
    public function user_can_successfully_rent_a_vehicle()
    {
        $rentalData = [
            'nama' => 'Ani Lestari',
            'email' => 'ani@gmail.com',
            'telepon' => '081987654321',
            'tanggal_rental' => now()->toDateString(),
            'tanggal_kembali' => now()->addDays(3)->toDateString(),
            'vehicle_id' => $this->vehicle->id,
            'alamat' => null, // Opsional
            'catatan' => null, // Opsional
        ];

        $response = $this->post('/rent', $rentalData);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('rentals', ['email' => 'ani@gmail.com',]);
    }

    #[Test]
    public function rental_fails_if_a_required_field_is_missing()
    {
        $rentalData = [
            'nama' => '', // Nama sengaja dikosongkan
            'email' => 'budi@example.com',
            'telepon' => '081234567890',
            'tanggal_rental' => now()->toDateString(),
            'tanggal_kembali' => now()->addDays(2)->toDateString(),
            'motor_id' => $this->motor->id,
        ];

        $response = $this->post('/rent', $rentalData);

        // Memastikan ada error validasi untuk field 'nama'
        $response->assertSessionHasErrors('nama');
    }

    #[Test]
     public function rental_fails_if_return_date_is_before_rental_date()
    {
        $rentalData = [
            'nama' => 'Dewi Anggraini',
            'email' => 'dewi@example.com',
            'telepon' => '081234567890',
            'tanggal_rental' => now()->addDays(2)->toDateString(),
            'tanggal_kembali' => now()->addDay()->toDateString(), // Kembali lebih dulu dari sewa
            'motor_id' => $this->motor->id,
        ];

        $response = $this->post('/rent', $rentalData);

        // Memastikan ada error validasi untuk field 'tanggal_kembali'
        $response->assertSessionHasErrors('tanggal_kembali');
    }

    #[Test]
    public function rental_is_rejected_if_phone_number_is_not_numeric()
    {
        $rentalData = [
            'nama' => 'Eko Prasetyo',
            'email' => 'eko@gmail.com',
            'telepon' => 'ini-bukan-nomor',
            'tanggal_rental' => now()->toDateString(),
            'tanggal_kembali' => now()->addDays(2)->toDateString(),
            'motor_id' => $this->motor->id,
        ];

        $response = $this->post('/rent', $rentalData);

        $response->assertSessionHasErrors('telepon');
    }
}
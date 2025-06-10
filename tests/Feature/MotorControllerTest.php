<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;
use App\Models\Motor;

class MotorControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;

    // Fungsi ini akan berjalan sebelum setiap tes untuk menyiapkan data
    protected function setUp(): void
    {
        parent::setUp();

        // Membuat user dengan role 'admin'
        $this->admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        // Membuat user dengan role 'user' (pengguna biasa)
        $this->user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => 'password',
            'role' => 'user',
        ]);
    }

    #[Test]
    public function guest_cannot_access_motor_management()
    {
        // Pengguna yang belum login mencoba mengakses halaman index
        $response = $this->get(route('admin.motors.index'));
        // Seharusnya diarahkan ke halaman login admin
        $response->assertRedirect('/admin/login');
    }

    #[Test]
    public function regular_user_cannot_access_motor_management()
    {
        // Login sebagai pengguna biasa
        $this->actingAs($this->user);
        
        // Mencoba mengakses halaman index
        $response = $this->get(route('admin.motors.index'));

        // Seharusnya akses ditolak (diarahkan ke halaman utama)
        $response->assertRedirect('/'); 
    }

    #[Test]
    public function admin_can_view_motor_list()
    {
        $this->actingAs($this->admin);

        // Membuat motor dummy untuk ditampilkan di daftar
        Motor::create(['nama_kendaraan' => 'Honda PCX', 'harga' => 150000, 'gambar' => 'pcx.jpg']);

        $response = $this->get(route('admin.motors.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.Motor.Data');
        $response->assertSee('Honda PCX'); // Memastikan data motor tampil
    }

    #[Test]
    public function admin_receives_validation_error_when_storing_with_invalid_data()
    {
        $this->actingAs($this->admin);
        
        // Data tidak valid (nama kosong)
        $response = $this->post(route('admin.motors.store'), ['nama_kendaraan' => '']);

        // Memastikan ada error validasi untuk field yang kosong
        $response->assertSessionHasErrors(['nama_kendaraan', 'harga', 'gambar']);
    }
    
    #[Test]
    public function admin_can_update_a_motor()
    {
        $this->actingAs($this->admin);
        Storage::fake('public');

        // Membuat data motor awal
        $motor = Motor::create([
            'nama_kendaraan' => 'Yamaha Fazzio',
            'harga' => 125000,
            'gambar' => 'fazzio.jpg',
        ]);

        $updateData = [
            'nama_kendaraan' => 'Yamaha Fazzio Hybrid', // Nama diubah
            'harga' => 135000, // Harga diubah
        ];

        $response = $this->put(route('admin.motors.update', $motor), $updateData);

        $response->assertRedirect(route('admin.motors.index'));
        $response->assertSessionHas('success');

        // Memastikan data di database telah diperbarui
        $this->assertDatabaseHas('motor', $updateData);
    }

}

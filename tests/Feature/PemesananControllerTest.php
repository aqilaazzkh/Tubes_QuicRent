<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;
use App\Models\Rental;
use App\Models\Motor;

class PemesananControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;

    // Menyiapkan user admin dan user biasa sebelum setiap tes
    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin Test',
            'email' => 'admin.pemesanan@example.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        $this->user = User::create([
            'name' => 'User Test',
            'email' => 'user.pemesanan@example.com',
            'password' => 'password',
            'role' => 'user',
        ]);
    }

    /**
     * Skenario 1: Memastikan tamu (guest) tidak bisa mengakses halaman pemesanan.
     */
    #[Test]
    public function guest_cannot_view_the_order_list()
    {
        // Mencoba mengakses halaman pemesanan tanpa login
        $response = $this->get(route('admin.pemesanan.index'));

        // Seharusnya diarahkan ke halaman login
        $response->assertRedirect('/admin/login');
    }

    /**
     * Skenario 2: Memastikan pengguna biasa (non-admin) tidak bisa mengakses halaman pemesanan.
     */
    #[Test]
    public function a_regular_user_cannot_view_the_order_list()
    {
        // Login sebagai pengguna biasa
        $this->actingAs($this->user);

        // Mencoba mengakses halaman pemesanan
        $response = $this->get(route('admin.pemesanan.index'));

        // Seharusnya akses ditolak dan diarahkan ke halaman utama
        $response->assertRedirect('/');
    }

    /**
     * Skenario 3: Memastikan admin bisa berhasil mengakses halaman pemesanan.
     */
    #[Test]
    public function an_admin_can_view_the_order_list()
    {
        // Login sebagai admin
        $this->actingAs($this->admin);

        // Membuat data motor dan data pemesanan dummy
        $motor = Motor::create(['nama_kendaraan' => 'NMAX', 'harga' => 150000, 'gambar' => 'nmax.jpg']);
        $rental = Rental::create([
            'nama' => 'Penyewa',
            'email' => 'penyewa@test.com',
            'telepon' => '081234567890',
            'tanggal_rental' => now(),
            'tanggal_kembali' => now()->addDay(),
            'motor_id' => $motor->id,
        ]);

        // Mengakses halaman pemesanan
        $response = $this->get(route('admin.pemesanan.index'));

        // Memastikan request berhasil
        $response->assertStatus(200);
        // Memastikan view yang benar ditampilkan
        $response->assertViewIs('admin.Pemesanan.Data');
        // Memastikan halaman menampilkan data penyewa yang baru dibuat
        $response->assertSee($rental->nama);
        $response->assertSee($rental->email);
    }
}

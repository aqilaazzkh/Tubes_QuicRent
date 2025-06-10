<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;

class PenggunaControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;

    // Menyiapkan user admin dan user biasa sebelum setiap tes dijalankan
    protected function setUp(): void
    {
        parent::setUp();

        // Membuat user dengan role 'admin'
        $this->admin = User::create([
            'name' => 'Admin Pengguna',
            'email' => 'admin.pengguna@example.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        // Membuat user dengan role 'user'
        $this->user = User::create([
            'name' => 'User Biasa',
            'email' => 'user.biasa@example.com',
            'password' => 'password',
            'role' => 'user',
        ]);
    }

    /**
     * Skenario 1: Memastikan tamu (guest) tidak bisa mengakses halaman daftar pengguna.
     */
    #[Test]
    public function guest_cannot_view_the_user_list()
    {
        // Mencoba mengakses halaman pengguna tanpa login
        $response = $this->get(route('admin.pengguna.index'));

        // Seharusnya diarahkan ke halaman login admin
        $response->assertRedirect('/admin/login');
    }

    /**
     * Skenario 2: Memastikan pengguna biasa (non-admin) tidak bisa mengakses halaman daftar pengguna.
     */
    #[Test]
    public function a_regular_user_cannot_view_the_user_list()
    {
        // Login sebagai pengguna biasa
        $this->actingAs($this->user);

        // Mencoba mengakses halaman pengguna
        $response = $this->get(route('admin.pengguna.index'));

        // Middleware CheckRole seharusnya menolak akses dan mengarahkan ke halaman utama
        $response->assertRedirect('/');
    }

    /**
     * Skenario 3: Memastikan admin bisa berhasil mengakses dan melihat daftar pengguna.
     */
    #[Test]
    public function an_admin_can_view_the_user_list()
    {
        // Login sebagai admin
        $this->actingAs($this->admin);

        // Mengakses halaman daftar pengguna
        $response = $this->get(route('admin.pengguna.index'));

        // Memastikan request berhasil (status 200 OK)
        $response->assertStatus(200);
        // Memastikan view yang benar ('admin.Pengguna.Data') ditampilkan
        $response->assertViewIs('admin.Pengguna.Data');
        // Memastikan halaman menampilkan nama dari user admin dan user biasa yang telah dibuat
        $response->assertSee($this->admin->name);
        $response->assertSee($this->user->name);
    }
}
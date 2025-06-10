<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Skenario Positif Registrasi (Mirip USR.001.001)
     * Memastikan pengguna bisa mendaftar dengan data yang valid.
     */
    #[Test]
    public function registration_is_successful_with_valid_data()
    {
        $userData = [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // Menggunakan nama route dari web.php untuk registrasi user
        $response = $this->post(route('registerUser'), $userData);
        
        $response->assertRedirect(route('loginuser'));
        $this->assertDatabaseHas('users', ['email' => 'newuser@example.com']);
    }

    /**
     * Skenario Negatif Registrasi (Mirip USR.001.002)
     * Memastikan pendaftaran gagal jika email sudah terdaftar.
     */
    #[Test]
    public function registration_fails_if_email_already_exists()
    {
        // Membuat user terlebih dahulu
        User::create([
            'name' => 'Existing User',
            'email' => 'existing@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // Mencoba mendaftar lagi dengan email yang sama
        $response = $this->post(route('registerUser'), [
            'name' => 'Another User',
            'email' => 'existing@example.com', // Email yang sudah ada
            'password' => 'password456',
            'password_confirmation' => 'password456',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /**
     * Skenario Negatif Registrasi (Mirip USR.001.003)
     * Memastikan pendaftaran gagal jika konfirmasi password tidak cocok.
     */
    #[Test]
    public function registration_fails_if_passwords_do_not_match()
    {
        $userData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'salah-password', // Konfirmasi tidak cocok
        ];
        
        // Asumsi dari AuthController Anda, validasi untuk password adalah 'confirmed'
        // Jika iya, Laravel akan otomatis memeriksa password_confirmation
        $response = $this->post(route('registerUser'), $userData);

        // Controller user Anda memiliki validasi 'password' => 'required|string|min:6'.
        // Agar tes ini berhasil, validasinya harus diubah menjadi 'password' => 'required|string|min:6|confirmed'.
        // Untuk sementara, kita asumsikan validasi 'confirmed' sudah ada.
        $response->assertSessionHasErrors('password');
    }

    /**
     * Skenario Positif Login (Mirip USR.002.001)
     * Memastikan pengguna bisa login dengan kredensial yang benar.
     */
    #[Test]
    public function login_is_successful_with_correct_credentials()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'liana@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user', 
        ]);

        // Menggunakan URL /login karena ada duplikasi nama route 'loginuser'
        $response = $this->post('/login', [
            'email' => 'liana@gmail.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/');
    }
    
    /**
     * Skenario Negatif Login (Mirip USR.002.002)
     * Memastikan login gagal jika email tidak terdaftar.
     */
    #[Test]
    public function login_fails_with_non_existent_email()
    {
        $response = $this->post('/login', [
            'email' => 'tidakada@example.com',
            'password' => 'password123',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /**
     * Skenario Negatif Login (Mirip USR.002.003)
     * Memastikan login gagal jika password salah.
     */
    #[Test]
    public function login_fails_with_incorrect_password()
    {
        User::create([
            'name' => 'Test User',
            'email' => 'liana@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        $response = $this->post('/login', [
            'email' => 'liana@gmail.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }
    
    /**
     * Skenario Positif Logout (Mirip USR.008.001)
     * Memastikan pengguna yang sudah login bisa keluar dari sistem.
     */
    #[Test]
    public function authenticated_user_can_logout()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user', 
        ]);
        $this->actingAs($user);

        $response = $this->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}

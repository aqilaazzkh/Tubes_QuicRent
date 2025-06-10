<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;

class AdminAuthTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }

    #[Test]
    public function admin_can_login_with_correct_credentials()
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($this->admin);
        $response->assertRedirect(route('admin.home'));
    }

    #[Test]
    public function a_regular_user_cannot_login_from_admin_form()
    {
        $response = $this->post('/admin/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors(['email' => 'Access denied.']);
    }

    #[Test]
    public function login_fails_with_incorrect_password()
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    #[Test]
    public function an_authenticated_admin_can_logout()
    {
        $this->actingAs($this->admin);

        $response = $this->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
    
    #[Test]
    public function a_new_admin_can_be_registered()
    {
        $adminData = [
            'name' => 'New Admin',
            'email' => 'newadmin@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->post('/admin/register', $adminData);
        
        $response->assertRedirect(route('login'));

        $this->assertDatabaseHas('users', [
            'email' => 'newadmin@example.com',
            'role' => 'admin'
        ]);
    }
}

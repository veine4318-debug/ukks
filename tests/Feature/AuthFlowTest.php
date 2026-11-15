<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_and_logout(): void
    {
        $user = User::create([
            'name' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        $loginResponse = $this->post('/login1', [
            'name' => 'admin',
            'password' => 'admin123',
        ]);

        $loginResponse->assertRedirect('/');
        $this->assertAuthenticatedAs($user);

        $logoutResponse = $this->post('/logout');

        $logoutResponse->assertRedirect('/login');
        $this->assertGuest();
    }

    public function test_admin_can_update_password(): void
    {
        $user = User::create([
            'name' => 'admin',
            'password' => Hash::make('oldPassword123'),
        ]);

        $this->actingAs($user)
            ->from('/dashboard')
            ->post('/ubah-password', [
                'current_password' => 'oldPassword123',
                'password' => 'newPassword123',
                'password_confirmation' => 'newPassword123',
            ])
            ->assertRedirect('/');

        $this->assertTrue(Hash::check('newPassword123', $user->fresh()->password));
    }
}

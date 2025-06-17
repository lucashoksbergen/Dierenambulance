<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;

    // Test whether the user can login with correct credentials


    public function test_user_can_login(): void
    {

        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('passwordtest'),
        ]);

        // Act
        $response = $this->post('/login', [
            'email' => $user['email'],
            'password' => 'passwordtest',
        ]);


        // Assert
        $response->assertRedirect(route('transfer.form.login'));
        $this->assertAuthenticatedAs($user);

    }

    // Test whether the user can login with an incorrect password
    public function test_user_cannot_login()
    {
        
        // Arrange
        $user = User::factory()->create([
            'password' => bcrypt('incorrect'),
        ]);


        // Act
        $response = $this->post('/login', [
            'email' => $user['email'],
            'password' => 'passwordtest',
        ]);


        // Assert
        $response->assertSessionHasErrors('error');
        $this->assertGuest();

    }

}

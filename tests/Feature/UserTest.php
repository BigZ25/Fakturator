<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use JsonException;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testLogin()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Pa$$w0rd'),
        ]);

        $response = $this->post(route('login.post'), [
            'email' => $user->email,
            'password' => 'Pa$$w0rd',
        ]);

        $response->assertOk();
    }

    public function testPasswordRegex()
    {
        $validPasswords = [
            'Password1!',
            'SecurePassword123@',
            'Test123$',
        ];

        $invalidPasswords = [
            'password',
            '12345678',
            'Password',
            'password123',
        ];

        foreach ($validPasswords as $password) {
            $this->assertMatchesRegularExpression(passwordRegex(), $password);
        }

        foreach ($invalidPasswords as $password) {
            $this->assertDoesNotMatchRegularExpression(passwordRegex(), $password);
        }
    }

    public function testToManyAttempts()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Pa$$w0rd'),
        ]);

        for ($i = 0; $i <= 5; $i++) {
            $response = $this->post(route('login.post'), [
                'email' => $user->email,
                'password' => 'Wr0ngPa$$w0rd',
            ]);
        }

        $this->assertEquals('Zbyt wiele prób, spróbuj ponownie później.', $response->exception->getMessage());
    }

    public function testPasswordHashing()
    {
        $password = 'secret';
        $hashedPassword = bcrypt($password);

        $this->assertTrue(Hash::check($password, $hashedPassword));

        $password = 'secret';
        $invalidPassword = 'incorrect';

        $hashedPassword = Hash::make($password);

        $this->assertFalse(Hash::check($invalidPassword, $hashedPassword));
    }
}

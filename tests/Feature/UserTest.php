<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}

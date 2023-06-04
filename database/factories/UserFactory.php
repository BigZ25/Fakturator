<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password,
            'company_nip' => $this->faker->regexify('/^[0-9]{10}$/'),
            'company_name' => $this->faker->company,
            'company_address' => $this->faker->address,
            'company_postcode' => $this->faker->regexify('/^\d{2}-\d{3}$/'),
            'company_city' => $this->faker->city,
        ];
    }
}

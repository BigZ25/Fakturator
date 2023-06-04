<?php

namespace Database\Factories\Modules\Customers;

use App\Models\Modules\Customers\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'nip' => $this->faker->regexify('/^[0-9]{10}$/'),
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'postcode' => $this->faker->regexify('/^\d{2}-\d{3}$/'),
            'city' => $this->faker->city,
        ];
    }
}

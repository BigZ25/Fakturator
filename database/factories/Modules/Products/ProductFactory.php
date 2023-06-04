<?php

namespace Database\Factories\Modules\Products;

use App\Enum\App\UnitsEnum;
use App\Enum\App\VatTypesEnum;
use App\Models\Modules\Products\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'unit' => $this->faker->randomElement(array_keys(UnitsEnum::getList())),
            'vat_type' => $this->faker->randomElement(array_keys(VatTypesEnum::getList())),
            'quantity' => $this->faker->randomFloat(2, 0.5, 10.0),
            'price' => $this->faker->randomFloat(2, 0.5, 1000.0),
        ];
    }
}

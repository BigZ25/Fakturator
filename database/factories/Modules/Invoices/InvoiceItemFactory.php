<?php

namespace Database\Factories\Modules\Invoices;

use App\Enum\App\PaymentMethodsEnum;
use App\Enum\App\UnitsEnum;
use App\Enum\App\VatTypesEnum;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceItemFactory extends Factory
{
    protected $model = InvoiceItem::class;

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

<?php

namespace Database\Factories\Modules\Invoices;

use App\Enum\App\PaymentMethodsEnum;
use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'number' => $this->faker->text(10),
            'send_email' => $this->faker->email,

            'buyer_nip' => $this->faker->regexify('/^[0-9]{10}$/'),
            'buyer_name' => $this->faker->company,
            'buyer_address' => $this->faker->streetAddress,
            'buyer_postcode' => $this->faker->regexify('/^\d{2}-\d{3}$/'),
            'buyer_city' => $this->faker->city,

            'recipient_nip' => $this->faker->regexify('/^[0-9]{10}$/'),
            'recipient_name' => $this->faker->company,
            'recipient_address' => $this->faker->streetAddress,
            'recipient_postcode' => $this->faker->regexify('/^\d{2}-\d{3}$/'),
            'recipient_city' => $this->faker->city,

            'seller_nip' => $this->faker->regexify('/^[0-9]{10}$/'),
            'seller_name' => $this->faker->company,
            'seller_address' => $this->faker->streetAddress,
            'seller_postcode' => $this->faker->regexify('/^\d{2}-\d{3}$/'),
            'seller_city' => $this->faker->city,

            'sale_date' => $this->faker->date,
            'issue_date' => $this->faker->date,
            'payment_date' => $this->faker->date,
            'payment_method' => $this->faker->randomElement(array_keys(PaymentMethodsEnum::getList())),
            'is_printed' => (int)$this->faker->boolean,
            'is_send' => (int)$this->faker->boolean,
        ];
    }
}

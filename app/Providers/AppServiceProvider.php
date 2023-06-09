<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PowerComponents\LivewirePowerGrid\Button;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Button::macro('icon', function (string $name) {
            $this->dynamicProperties['icon'] = $name;

            return $this;
        });

        Button::macro('canIf', function (string $field, string $operator, $value) {
            $this->dynamicProperties['canIf'] = [
                'field' => $field,
                'operator' => $operator,
                'value' => $value,
            ];

            return $this;
        });
    }
}

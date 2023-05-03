<?php

return [
    'invoices' => [
        'label' => 'Faktury',
        'icon' => 'fa-file-invoice-dollar',
        'route' => 'invoices.index',
    ],
    'products' => [
        'label' => 'Produkty',
        'icon' => 'fa-warehouse',
        'route' => 'products.index',
    ],
    'customers' => [
        'label' => 'Klienci',
        'icon' => 'fa-users',
        'route' => 'customers.index',
    ],
    'settings' => [
        'label' => 'Ustawienia',
        'icon' => 'fa-cog',
        'route' => 'settings.form',
    ],
    'logout' => [
        'label' => 'Wyloguj się',
        'icon' => 'fa-sign-out',
        'route' => 'logout',
    ],
];

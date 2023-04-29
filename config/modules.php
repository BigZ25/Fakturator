<?php

return [
    'invoices' => [
        'label' => 'Faktury',
        'icon' => 'fa-box-archive',
        'route' => 'invoices.index',
    ],
    'products' => [
        'label' => 'Produkty',
        'icon' => 'fa-cube',
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

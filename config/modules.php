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
//    'customers' => [
//        'label' => 'Klienci',
//        'icon' => 'fa-users',
//        'route' => 'customers.index',
//    ],
    'account_settings' => [
        'label' => 'Ustawienia konta',
        'icon' => 'fa-cog',
        'route' => 'account_settings.form',
    ],
    'logout' => [
        'label' => 'Wyloguj się',
        'icon' => 'fa-sign-out',
        'route' => 'logout',
    ],
];

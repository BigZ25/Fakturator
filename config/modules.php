<?php

return [
    'adverts' => [
        'label' => 'Ogłoszenia',
        'icon' => 'fa-box-archive',
        'route' => 'adverts.index',
    ],
    'description_template' => [
        'label' => 'Wzór opisu',
        'icon' => 'fa-file-text',
        'route' => 'description_template.index',
    ],
    'queue' => [
        'label' => 'Kolejka',
        'icon' => 'fa-list',
        'route' => 'queue.index',
    ],
    'observations' => [
        'label' => 'Obserwacje',
        'icon' => 'fa-eye',
        'route' => 'observations.index',
    ],
    'notifications' => [
        'label' => 'Powiadomienia',
        'icon' => 'fa-bell',
        'route' => 'notifications.index',
    ],
    'collections' => [
        'label' => 'Kolekcje',
        'icon' => 'fa-cube',
        'route' => 'collections.index',
    ],
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

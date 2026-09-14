<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Settings Page Language Lines
    |--------------------------------------------------------------------------
    |
    | The settings screen is generated from config/app_settings.php. Config is
    | resolved before the locale middleware runs (and may be cached), so the
    | labels cannot be translated in the config file itself; SettingController
    | overlays these lines onto the settings UI at request time instead.
    |
    | Sections are keyed by their section key and inputs by their setting name,
    | both as declared in config/app_settings.php.
    |
    */

    'submit' => 'Save Settings',
    'saved' => 'Settings has been saved.',

    'sections' => [
        'app' => [
            'title' => 'App General Settings',
            'descriptions' => 'Application general settings.',
        ],
        'email' => [
            'title' => 'Email Settings',
            'descriptions' => 'How app email will be sent.',
        ],
    ],

    'inputs' => [
        'app_name' => [
            'label' => 'App Name',
            'placeholder' => 'Application Name',
            'hint' => 'You can set the app name here',
        ],
        'app_currency' => [
            'label' => 'App Currency',
            'placeholder' => 'Application Currency',
            'hint' => 'Use your currency symbol like this $',
        ],
        'logo' => [
            'label' => 'Upload logo',
            'hint' => 'Must be an image and cropped in desired size',
        ],
        'favicon' => [
            'label' => 'Upload favicon',
            'hint' => 'Recommended image size is 16px x 16px or 32px x 32px',
        ],
        'from_email' => [
            'label' => 'From Email',
            'placeholder' => 'Application from email',
        ],
        'from_name' => [
            'label' => 'Email from Name',
            'placeholder' => 'Email from Name',
        ],
    ],

];

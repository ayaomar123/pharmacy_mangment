<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Settings Page Language Lines
    |--------------------------------------------------------------------------
    |
    | Arabic counterpart of resources/lang/en/settings.php. Sections are keyed
    | by their section key and inputs by their setting name, both as declared
    | in config/app_settings.php.
    |
    */

    'submit' => 'حفظ الإعدادات',
    'saved' => 'تم حفظ الإعدادات.',

    'sections' => [
        'app' => [
            'title' => 'الإعدادات العامة للتطبيق',
            'descriptions' => 'الإعدادات العامة للتطبيق.',
        ],
        'email' => [
            'title' => 'إعدادات البريد الإلكتروني',
            'descriptions' => 'طريقة إرسال رسائل البريد الإلكتروني من التطبيق.',
        ],
    ],

    'inputs' => [
        'app_name' => [
            'label' => 'اسم التطبيق',
            'placeholder' => 'اسم التطبيق',
            'hint' => 'يمكنك تعيين اسم التطبيق من هنا',
        ],
        'app_currency' => [
            'label' => 'عملة التطبيق',
            'placeholder' => 'عملة التطبيق',
            'hint' => 'استخدم رمز العملة مثل $',
        ],
        'logo' => [
            'label' => 'رفع الشعار',
            'hint' => 'يجب أن يكون صورة مقصوصة بالمقاس المطلوب',
        ],
        'favicon' => [
            'label' => 'رفع أيقونة الموقع',
            'hint' => 'المقاس الموصى به للصورة هو 16×16 أو 32×32 بكسل',
        ],
        'from_email' => [
            'label' => 'البريد المُرسِل',
            'placeholder' => 'البريد الإلكتروني المُرسِل للتطبيق',
        ],
        'from_name' => [
            'label' => 'اسم المُرسِل',
            'placeholder' => 'اسم المُرسِل في البريد',
        ],
    ],

];

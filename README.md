# laravel-logsis
Простой Laravel фасад для работы с API logsis.ru

    composer require andreyartamonov/laravel-logsis

В app/config/services.php добавить следующий массив:

    'logsis' => [
        'api_key' => 'Ваш ключ'
    ]

-----------------------------
Все методы и передаваемые параметры можно посмотреть здесь

    http://api.logsis.ru/logsis-api/

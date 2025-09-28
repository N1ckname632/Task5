# Запуск проекта

## Настройка базы данных

1. В папке `Cfg` создайте файл `Config.php`

2. Вставьте в него следующий код и впишите данные своей базы данных:

```php

<?php 

namespace Cfg;

abstract class Config {
    protected $host = "";         // адрес сервера базы данных
    protected $username = "";     // пользователь базы данных
    protected $password = "";     // пароль пользователя базы данных
    protected $dbname = "";       // имя базы данных
}

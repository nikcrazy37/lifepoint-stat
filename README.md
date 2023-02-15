# Сбор статистики

## Описание

Библиотека предназначена для работы с различными аналитическими данными. Основные функции: положить, забрать.
Есть возможность переключения места хранения данных.

## Конфигурация

Первым делом требуется создать файл ***config.ini*** и указать настройки подключения.
В качестве примера можно использовать ***example.config.ini*** в корне библиотеки.
В этом же файле указывается используемый драйвер и таблица в БД.

Доступные драйверы и синтаксис наименований таблиц:
- Lifepoint\Stat\Core\Database\Driver\MySQL - "table";
- Lifepoint\Stat\Core\Database\Driver\ClickHouse - "database.table".

## Инициализация

Для сбора статистики переходов на электронный коуч инициализируем ***Lifepoint\Stat\Repository\ECoach***:

```php
$repository = new ECoach();
```

## Использование

***ECoach*** реализует два метода для работы с хранилищем:
 - **add** - запись перехода;
 - **get** - получение статистики переходов по фильтру.

### add()

На вход принимает модель ***Lifepoint\Stat\Entity\ECoach***. Пример:

```php
$repository->add(
    new ECoach(
        array(
            "userId" => 1,
            "userName" => "some user name",
            "bankId" => 1,
            "bankName" => "some bank name",
            "login" => "some login",
            "departmentId" => 1,
            "departmentName" => "some department name",
            "cityId" => 1,
            "cityName" => "some city name",
            "ip" => "127.0.0.1",
            "geo" => "{'latitude': 'latitude value', 'longtitude': 'longtitude value'}",
            "url" => "some url",
            "userAgent" => "some userAgent",
        )
    )
);
```

### get()

На вход принимает массив с вложенной структурой. Ключ - наименование фильтра. Значение - массив значений для фильтра. Пример:

```php
$repository->get(
    array(
        "where" => array(
            new Where("dateCreate", ">=", "2023-02-10 00:00:00"),
            new Where("dateCreate", "<=", "2023-02-12 23:59:59"),
        ),
    )
);
```

В данном случае запрос в хранилище фильтруется по "where". В модель ***Lifepoint\Stat\Entity\Query\Where*** кладём:
 - Наименование параметра, по которому фильтруем;
 - Оператор сравнения;
 - Значение для фильтрации.

Параметры будут перечислены в запросе с relation = AND.
# Инструкция по развертыванию приложения

## Установка

### Для локального развертывания

* Клонируем репозиторий командой `git clone https://github.com/JavNikTool/guest-service`
* Переходим в директорию с проектом
* Устанавливаем зависимости `composer install`
* Копируем `.env.example` в `.env`
* Создаем ключ для приложения `php artisan key:generate`
* Запускаем миграции `php artisan migrate`
* Запускаем сидеры `php artisan db:seed`
* Запускаем сервер `php artisan serve`

### Запуск с помощью Docker


* Клонируем репозиторий командой `git clone https://github.com/JavNikTool/guest-service`
* Переходим в директорию с проектом
* Копируем `.env.example` в `.env`
* Создаем ключ для приложения `php artisan key:generate`
* Запускаем Docker `docker compose up -d --build`

## Документация маршрутов

* Документация маршрутов доступна по адресу `http://{host}:{port}/docs/api`

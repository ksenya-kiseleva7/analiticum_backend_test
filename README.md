Laravel API для найма курьеров и распределения заказов

📌 Описание
Этот проект — REST API, разработанное на Laravel 10+ для управления курьерами и заказами.

📋 Технологии
PHP 8+
Laravel 10+
Laravel Sanctum (аутентификация)
Docker (контейнеризация)
MySQL (база данных)

⚙️ Установка и запуск

1️⃣ Клонирование репозитория
git clone https://github.com/твой-логин-на-github/твой-репозиторий.git
cd твой-репозиторий

2️⃣ Установка зависимостей
composer install

3️⃣ Копирование .env и генерация ключа
cp .env.example .env
php artisan key:generate

4️⃣ Настройка базы данных
В файле .env укажи параметры БД, затем выполни миграции:
php artisan migrate --seed

5️⃣ Запуск сервера
php artisan serve

🔑 Аутентификация
Используется Laravel Sanctum. Для работы с API сначала войдите:

POST /login  
Полученный токен используйте в заголовке:
Authorization: Bearer {your_token}

📄 Документация API
Postman Collection доступен в репозитории:
docs/postman/delivery-api.postman_collection.json
Импортируйте его в Postman, чтобы протестировать API.

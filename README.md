# Laravel API для найма курьеров и распределения заказов

📌 **Описание**  
Этот проект — **REST API**, разработанное на **Laravel 10+** для управления курьерами и заказами.

---

##  Технологии
- **PHP 8+**
- **Laravel 10+**
- **Laravel Sanctum** (аутентификация)
- **Docker** (контейнеризация)
- **MySQL** (база данных)

---

## Установка и запуск

### 1.Клонирование репозитория
```bash
https://github.com/ksenya-kiseleva7/analiticum_backend_test.git
```
cd твой-репозиторий

### 2.Установка зависимостей
```bash
composer install
```

### 3.Копирование .env и генерация ключа
```bash
cp .env.example .env
php artisan key:generate
```

### 4.Настройка базы данных
В файле .env укажи параметры БД, затем выполни миграции:
```bash
php artisan migrate --seed
```

### 5.Запуск сервера
```bash
php artisan serve
```
---
### 🔑 Аутентификация
Используется Laravel Sanctum. Для работы с API сначала войдите:

POST /login  
Полученный токен используйте в заголовке:
Authorization: Bearer {your_token}

📄 Документация API
Postman Collection доступен в репозитории:
```bash
docs/postman/delivery-api.postman_collection.json
```
Импортируйте его в Postman, чтобы протестировать API.

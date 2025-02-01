# Используем официальный образ PHP с Apache
FROM php:8.2-apache

# Устанавливаем расширения и зависимости
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Копируем файлы проекта
COPY . .

# Устанавливаем зависимости проекта через Composer
RUN composer install --no-dev --optimize-autoloader

# Делаем storage и bootstrap/cache доступными для записи
RUN chmod -R 775 storage bootstrap/cache && chown -R www-data:www-data storage bootstrap/cache

# Открываем порт
EXPOSE 80

# Запускаем Apache
CMD ["apache2-foreground"]

# Используем официальный образ PHP с FPM
FROM php:8.4-fpm

# Устанавливаем системные зависимости и расширения PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nano \
    libmagickwand-dev --no-install-recommends

# Очищаем кэш
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем расширения PHP, необходимые для Laravel (MySQL, BCMath и др.)
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Устанавливаем Composer внутрь контейнера
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем файлы проекта
COPY . .

# Устанавливаем права на папки
RUN chown -R www-data:www-data /var/www/html

# Запускаем PHP-FPM
CMD ["php-fpm"]

# Открываем порт 9000 для PHP-FPM
EXPOSE 9000

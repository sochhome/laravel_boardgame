FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip sqlite3 libsqlite3-dev nodejs npm

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Install Node dependencies first
COPY package.json package-lock.json ./
RUN npm install

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Build Vite assets
RUN npm run build

# Ensure SQLite file exists
RUN mkdir -p database && touch database/database.sqlite

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache database

# Clear caches to avoid stale Vite manifest
RUN php artisan config:clear && php artisan route:clear && php artisan view:clear

EXPOSE 10000

CMD ["/bin/sh", "-c", "\
    if [ ! -f .env ]; then \
        cp .env.example .env; \
    fi && \
    php artisan key:generate --force && \
    php artisan migrate --force || true && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan serve --host=0.0.0.0 --port=10000 \
"]
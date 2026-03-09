FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip sqlite3 libsqlite3-dev nodejs npm

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Build Vite assets
RUN npm install && npm run build

# Ensure SQLite file exists
RUN mkdir -p database && touch database/database.sqlite

# Fix permissions
RUN chmod -R 775 storage bootstrap/cache database

# Expose Render port
EXPOSE 10000

# Run artisan commands at runtime (NOT during build)
CMD php artisan key:generate --force && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan serve --host=0.0.0.0 --port=10000
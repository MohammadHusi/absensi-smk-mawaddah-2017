FROM php:8.3-fpm-alpine

# Install system dependencies & extension compiler tools
RUN apk add --no-cache \
    nginx \
    shadow \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    nodejs \
    npm \
    oniguruma-dev

# Konfigurasi & install ekstensi PHP yang dibutuhkan Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql bcmath gd xml zip mbstring opcache

# Install Composer resmi
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy seluruh source code
COPY . .

# Install PHP dependencies untuk production
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Build frontend assets (Vite)
RUN npm install && npm run build

# Setup Nginx configuration
RUN echo 'server { \
    listen 80; \
    server_name localhost; \
    root /app/public; \
    index index.php index.html; \
    client_max_body_size 64M; \
    location / { \
        try_files $uri $uri/ /index.php?$query_string; \
    } \
    location ~ \.php$ { \
        try_files $uri =404; \
        fastcgi_split_path_info ^(.+\.php)(/.+)$; \
        fastcgi_pass 127.0.0.1:9000; \
        fastcgi_index index.php; \
        include fastcgi_params; \
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \
        fastcgi_param PATH_INFO $fastcgi_path_info; \
    } \
}' > /etc/nginx/http.d/default.conf

# Setup permission untuk user nginx dan www-data
RUN chown -R www-data:www-data /app \
    && chmod -R 775 /app/storage /app/bootstrap/cache \
    && adduser nginx www-data

EXPOSE 80

# Jalankan PHP-FPM di background dan Nginx di foreground
CMD php-fpm -D && nginx -g "daemon off;"

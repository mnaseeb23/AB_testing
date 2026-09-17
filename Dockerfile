FROM wordpress:php8.2-apache

# Install required system packages, mysql client, and utilities
RUN apt-get update && apt-get install -y --no-install-recommends \
    default-mysql-client \
    curl \
    less \
    sudo \
    unzip \
    libzip-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip intl opcache \
    && rm -rf /var/lib/apt/lists/*

# Install WP-CLI
RUN curl -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp

# Custom PHP settings for high-performance e-commerce
RUN { \
    echo 'memory_limit = 512M'; \
    echo 'upload_max_filesize = 128M'; \
    echo 'post_max_size = 128M'; \
    echo 'max_execution_time = 300'; \
    echo 'max_input_vars = 5000'; \
    echo 'opcache.enable = 1'; \
    echo 'opcache.memory_consumption = 128'; \
    echo 'opcache.interned_strings_buffer = 8'; \
    echo 'opcache.max_accelerated_files = 10000'; \
    echo 'opcache.revalidate_freq = 2'; \
} > /usr/local/etc/php/conf.d/ecommerce.ini

# Copy entrypoint wrapper
# Normalize CRLF -> LF in case the script was edited/checked out on Windows;
# a stray \r in the shebang line causes "env: 'bash\r': No such file or
# directory" and an immediate container restart loop.
COPY docker-entrypoint-custom.sh /usr/local/bin/docker-entrypoint-custom.sh
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint-custom.sh \
    && chmod +x /usr/local/bin/docker-entrypoint-custom.sh

ENTRYPOINT ["docker-entrypoint-custom.sh"]
CMD ["apache2-foreground"]

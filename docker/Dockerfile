## Install phase
FROM php:8.3-fpm-alpine AS installer

# build paramaters
ARG env=production

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apk add --no-cache build-base autoconf libzip-dev mariadb-client freetype-dev libpng-dev libjpeg-turbo-dev curl git openssh-client icu-dev less

# install node only on dev
#RUN if [[ "$env" == "dev" ]] ; then \
#    echo "Installing dev tools" && apk add bash nodejs-current npm python2  ;\
#    fi

# Install extensions
RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache
RUN docker-php-ext-install pdo_mysql zip exif pcntl intl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install calendar && docker-php-ext-configure calendar
RUN pecl channel-update pecl.php.net && \
    pecl install apfd && \
    pecl install redis && \
    docker-php-ext-enable redis

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN addgroup -g 1000 www
RUN adduser -u 1000 -S -G www www

# add PHP configurations
COPY docker/php/${env} /usr/local/etc/php/conf.d/

# Copy existing application directory permissions
COPY --chown=www:www src/ /var/www/html

# Install composer dependencies and generate
RUN composer install --no-dev --no-interaction --no-cache
RUN composer dumpautoload -o
# delete composer credentials
#RUN rm /var/www/html/auth.json

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
ENV HOST 0.0.0.0
CMD ["php-fpm"]
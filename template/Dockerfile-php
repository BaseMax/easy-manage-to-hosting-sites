FROM php:8.1-fpm-alpine

RUN apk update

RUN apk upgrade

RUN apk add \
    gcc \
    g++ \
    cmake \
    make \
    autoconf \
    libedit \
    openssl \
    openssl-dev \
    libedit-dev \
    libcurl \
    curl-dev \
    libtool \
    pkgconfig \
    zlib-dev \
    build-base \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    libxml2-dev \
    curl \
    wget \
    git \
    readline-dev \
    readline \
    bash \
    nano \
    icu-dev \
    libsodium \
    oniguruma-dev \
    gnu-libiconv \
    gnu-libiconv-dev \
    ncurses-dev \
    ncurses \
    gettext-dev \
    gettext \
    libc6-compat \
    libudev-zero

RUN apk add --update linux-headers
RUN pecl install xdebug redis

RUN docker-php-ext-enable xdebug redis

RUN docker-php-ext-install -j$(nproc) gettext
RUN docker-php-ext-install -j$(nproc) curl
RUN docker-php-ext-install -j$(nproc) filter
RUN docker-php-ext-install -j$(nproc) dom
RUN docker-php-ext-install -j$(nproc) fileinfo
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install -j$(nproc) mysqli
RUN docker-php-ext-install -j$(nproc) pdo
RUN docker-php-ext-install -j$(nproc) pdo_mysql
RUN docker-php-ext-install -j$(nproc) zip
RUN docker-php-ext-install -j$(nproc) intl
RUN docker-php-ext-install -j$(nproc) mbstring
RUN docker-php-ext-install -j$(nproc) soap
RUN docker-php-ext-install -j$(nproc) xml
RUN docker-php-ext-install -j$(nproc) opcache

RUN wget -qO /tmp/ioncube.tar.gz https://downloads.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz && \
    tar -xzf /tmp/ioncube.tar.gz -C /tmp && \
    mv /tmp/ioncube/ioncube_loader_lin_8.1.so /usr/local/lib/php/extensions/no-debug-non-zts-20210902/ && \
    echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20210902/ioncube_loader_lin_8.1.so" > /usr/local/etc/php/conf.d/00-ioncube.ini && \
    rm -rf /tmp/ioncube /tmp/ioncube.tar.gz

COPY ./assets/loaders.linux_x86_64.tar.gz /tmp/loaders.linux_x86_64.tar.gz

RUN tar -xzf /tmp/loaders.linux_x86_64.tar.gz -C /tmp
RUN ls -al /tmp
RUN mv /tmp/ixed.8.1.lin /usr/local/lib/php/extensions/no-debug-non-zts-20210902/
RUN mv /tmp/ixed.8.1ts.lin /usr/local/lib/php/extensions/no-debug-non-zts-20210902/
RUN echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20210902/ixed.8.1.lin" > /usr/local/etc/php/conf.d/00-sourceguardian.ini
RUN rm -rf /tmp/sourceguardian /tmp/loaders.linux_x86_64.tar.gz

RUN apk add shadow
RUN useradd -m -u 1000 phpuser

COPY ./config/php.ini /usr/local/etc/php/conf.d/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R phpuser:phpuser /usr/local/lib/php/extensions
RUN chown -R phpuser:phpuser /var/www/html

RUN php -v
WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]

FROM php:8.1-fpm

# Instala as extensões necessárias para o Laravel e para o GD
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpa o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilita as extensões PHP instaladas
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala o composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && unlink composer-setup.php

# Configura o timezone
RUN echo 'date.timezone="America/Sao_Paulo"' >> /usr/local/etc/php/conf.d/date.ini

# Define o diretório de trabalho
WORKDIR /var/www/html

# Corrige as permissões da pasta
RUN chmod 777 -R /var/www/html
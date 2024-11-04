# Usando imagem oficial do PHP
FROM php:8.1-fpm

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip

# Instala o Xdebug
RUN curl -fsSL https://xdebug.org/files/xdebug-3.2.0.tgz -o xdebug.tgz \
    && tar -xzf xdebug.tgz \
    && cd xdebug-3.2.0 \
    && phpize \
    && ./configure --enable-xdebug \
    && make \
    && make install \
    && docker-php-ext-enable xdebug \
    && rm -rf /xdebug-3.2.0 /xdebug.tgz

# Instala extensões PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www

# Copia o código do Laravel para o contêiner
COPY . .

# Dá permissão à pasta storage e bootstrap
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expõe a porta 9001 para evitar conflito com o outro projeto
EXPOSE 9001

CMD ["php-fpm"]

# Use uma imagem oficial do PHP com FPM
FROM php:8.3-fpm

# Instalar utilitários básicos para o Composer (git e unzip)
RUN apt-get update && apt-get install -y git unzip && rm -rf /var/lib/apt/lists/*

# Copiar o Composer da imagem oficial para /usr/local/bin e dar permissão de execução
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

# Instalar a extensão pdo_mysql para conexão com o MySQL
RUN docker-php-ext-install pdo_mysql

# Definir o diretório de trabalho

WORKDIR /
RUN mkdir laravel
WORKDIR /laravel

# # Instalar as dependências do Laravel
# RUN composer install
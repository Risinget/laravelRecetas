# Usar la imagen oficial de PHP con Apache, versión PHP 8.x
FROM php:8.1-apache

# Instalar extensiones adicionales de PHP si es necesario
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar el mod_rewrite de Apache, necesario para algunas aplicaciones web
RUN a2enmod rewrite

# Copiar tu aplicación al contenedor
COPY . /var/www/html

# Opcional: asignar permisos (ajustar según necesidad)
RUN chown -R www-data:www-data /var/www/html

# El puerto 80 ya está expuesto por la imagen base php:apache
# Exponer el puerto 80 para acceder al servidor Apache
EXPOSE 80
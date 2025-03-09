# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Copia todos los archivos del proyecto al contenedor
COPY . /var/www/html/

# Habilita extensiones necesarias (como MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Exponer el puerto 80 para el tráfico HTTP
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]

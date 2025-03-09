# Usa una imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilita el mod_rewrite
RUN a2enmod rewrite

# Copia todos los archivos al contenedor
COPY . /var/www/html/

# Ajusta los permisos para los archivos de Apache
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Mantén Apache ejecutándose
CMD ["apache2-foreground"]

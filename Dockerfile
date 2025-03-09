# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Copia el archivo de configuración personalizado de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copia el código de tu proyecto al contenedor
COPY . /var/www/html/

# Cambia la propiedad de los archivos para el usuario 'www-data' de Apache
RUN chown -R www-data:www-data /var/www/html

# Asegura que Apache sirva archivos desde la carpeta 'public'
RUN echo "DocumentRoot /var/www/html/public" >> /etc/apache2/sites-available/000-default.conf

# Expón el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]

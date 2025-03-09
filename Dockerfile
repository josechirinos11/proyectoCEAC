# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala las dependencias necesarias para PDO y MySQL
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Copia el archivo de configuración personalizado de Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copia el código de tu proyecto al contenedor
COPY . /var/www/html/

# Cambia la propiedad de los archivos para el usuario 'www-data' de Apache
RUN chown -R www-data:www-data /var/www/html

# Expón el puerto 80
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]

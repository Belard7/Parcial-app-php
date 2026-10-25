FROM php:8.2-apache

# Habilitar extensiones de PDO para conectar con MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiar todo el código fuente al contenedor
COPY . /var/www/html/

# Configurar Apache para que apunte a la carpeta "public"
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -s "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf
RUN sed -ri -s "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Modificar el puerto por defecto de Apache para que use la variable $PORT de Render
RUN sed -i 's/80/\${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
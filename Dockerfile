FROM php:8.2-apache

# Habilitar extensiones de PDO para conectar con MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copiar todo el código fuente al contenedor
COPY . /var/www/html/

# Configurar Apache para que apunte automáticamente a tu carpeta "public"
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -s "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf
RUN sed -ri -s "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar el script de inicio y otorgarle permisos de ejecución
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Definir el comando de arranque del contenedor
CMD ["/usr/local/bin/start.sh"]
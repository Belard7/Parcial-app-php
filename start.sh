#!/bin/bash
# Reemplazar el puerto 80 por el puerto dinámico que asigna Render ($PORT)
sed -i "s/80/${PORT}/g" /etc/apache2/sites-available/000-default.conf
sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf

# Iniciar Apache en primer plano
exec apache2-foreground
FROM php:7.4-apache

# Instalamos sudo y dependencias
RUN apt-get update && apt-get install -y sudo

# Configuramos el permiso para que el usuario web pueda usar tail
COPY pistasudo /etc/sudoers.d/pistasudo
RUN chmod 0440 /etc/sudoers.d/pistasudo

# Copiamos todo el contenido de tu carpeta actual al servidor
COPY . /var/www/html/

EXPOSE 80

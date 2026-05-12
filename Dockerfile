FROM php:7.4-apache

# 1. Instalamos sudo y mysqli
RUN apt-get update && apt-get install -y sudo && \
    docker-php-ext-install mysqli

# 2. Creamos las carpetas y las flags (Sincronizado con la pista del HTML)
RUN mkdir -p /var/backups/secret_data && \
    echo 'FLAG{Post_Explotacion_Master_2026}' > /var/backups/secret_data/root_flag.txt && \
    mkdir -p /var/www/html/uploads && \
    chmod -R 777 /var/www/html/uploads && \
    echo "FLAG{VulnefLab_Root_Access_2026}" > /root/flag3.txt && \
    chmod 600 /root/flag3.txt

# 3. Configuramos el permiso de sudo
COPY pistasudo /etc/sudoers.d/pistasudo
RUN chmod 0440 /etc/sudoers.d/pistasudo

# 4. Copiamos el código
COPY . /var/www/html/

EXPOSE 80

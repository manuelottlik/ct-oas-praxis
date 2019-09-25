# Basis-Image für diesen Container ist nach wie vor php:apache
FROM php:apache

# damit Composer Pakete entpacken kann, müssen zip & unzip installiert sein
RUN apt-get update && apt-get install -y zip unzip

# der Entrypoint von Laravel wird in der Apache Config eingerichtet
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# alle URLs sollen auf die public/index.php geleitet werden
RUN a2enmod rewrite headers

# der Anwendungscode wird in den Container kopiert
COPY lib/ /var/www/html/

# Composer wird heruntergeladen & installiert
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Arbeitsverzeichnis wird gesetzt
WORKDIR /var/www/html

# Abhängigkeiten werden mittels Composer installiert
RUN composer install

# Script für den Container-Start wird in den Container kopiert
COPY startup.sh /usr/local/bin/startup.sh

# Nutzer wird auf das Script berechtigt
RUN chmod +x /usr/local/bin/startup.sh

# Script wird ausgeführt
CMD ["/usr/local/bin/startup.sh"]
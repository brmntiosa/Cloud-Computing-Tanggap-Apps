# Gunakan image dasar untuk PHP dan Apache
FROM php:8.1-apache

# Install ekstensi PHP yang dibutuhkan
RUN docker-php-ext-install mysqli

# Salin file project ke direktori kerja di container
COPY . /var/www/html/

# Ubah permission (jika diperlukan)
RUN chown -R www-data:www-data /var/www/html

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Ganti konfigurasi Apache agar listen di port 8080 (Cloud Run default)
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf && \
    sed -i 's/:80>/:8080>/' /etc/apache2/sites-available/000-default.conf

# Expose port yang diharapkan Cloud Run
EXPOSE 8080


RUN cat /var/www/html/pages/pengaduan.html | grep 'storage.googleapis.com'


# Default CMD (dari apache image)
CMD ["apache2-foreground"]

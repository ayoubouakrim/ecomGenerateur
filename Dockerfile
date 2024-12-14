FROM richarvey/nginx-php-fpm:3.1.6
COPY . .

# Install Node.js and npm
RUN apk add --update nodejs npm

# Install npm dependencies and build assets
RUN npm install
RUN npm run build

ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]
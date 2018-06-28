FROM php:7-cli-alpine
RUN apk --update add --no-cache --virtual=build-dependencies autoconf g++ make \
  && pecl install ast \
  && docker-php-ext-enable ast \
  && apk del --purge build-dependencies
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["sh", "-c", "php bin/ast.php | php bin/remove_lineno.php"]

FROM php:7.3-fpm-alpine

RUN apk update --no-cache >/dev/null 2>&1 && \
    apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS >/dev/null 2>&1 && \
    docker-php-ext-configure mysqli \
        --with-mysqli=mysqlnd >/dev/null 2>&1 && \
    NPROC=$(grep -c ^processor /proc/cpuinfo || 1) && \
    docker-php-ext-install -j${NPROC} mysqli >/dev/null 2>&1 && \
    apk del .phpize-deps >/dev/null 2>&1 && \
    rm -rf /tmp/* /var/cache/apk/*

EXPOSE 9000

CMD ["php-fpm"]

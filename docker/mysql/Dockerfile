# Build stage for Pinba
FROM alpine:3.19 AS pinba-builder

# Install build dependencies
RUN apk add --no-cache \
    autoconf \
    automake \
    bash \
    g++ \
    gcc \
    git \
    libtool \
    make \
    php81-dev \
    php81-pear \
    re2c

# Clone and build Pinba
WORKDIR /build
RUN git clone --depth 1 https://github.com/tony2001/pinba_extension.git && \
    cd pinba_extension && \
    phpize81 && \
    ./configure --enable-pinba --with-php-config=/usr/bin/php-config81 && \
    make -j$(nproc) && \
    make install

# Final stage
FROM alpine:3.19

# Install runtime dependencies
RUN apk add --no-cache \
    bash \
    libaio \
    libstdc++ \
    mariadb \
    mariadb-client \
    mariadb-server-utils \
    php81 \
    php81-cli \
    php81-fpm \
    php81-mysqli \
    php81-pdo \
    php81-pdo_mysql \
    tzdata

# Copy Pinba extension
COPY --from=pinba-builder /usr/lib/php81/modules/pinba.so /usr/lib/php81/modules/

# Configure PHP
RUN echo "extension=pinba.so" > /etc/php81/conf.d/pinba.ini && \
    echo "pinba.server=127.0.0.1:3306" >> /etc/php81/conf.d/pinba.ini && \
    echo "pinba.enabled=1" >> /etc/php81/conf.d/pinba.ini

# Configure MariaDB
RUN mkdir -p /var/lib/mysql && \
    chown -R mysql:mysql /var/lib/mysql && \
    mysql_install_db --user=mysql --datadir=/var/lib/mysql

# Copy MariaDB configuration
COPY my.cnf /etc/my.cnf

# Expose ports
EXPOSE 3306 9000

# Start services
COPY start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"] 
#!/bin/bash

# Create necessary directories
mkdir -p /var/run/mysqld
mkdir -p /var/log/mysql
chown -R mysql:mysql /var/run/mysqld
chown -R mysql:mysql /var/log/mysql

# Start MariaDB
mysqld --user=mysql &

# Wait for MariaDB to be ready
until mysqladmin ping -h"localhost" --silent; do
    sleep 1
done

# Create Pinba database and tables
mysql -u root << EOF
CREATE DATABASE IF NOT EXISTS pinba;
USE pinba;

CREATE TABLE IF NOT EXISTS request (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    hostname VARCHAR(255) NOT NULL,
    server_name VARCHAR(255) NOT NULL,
    script_name VARCHAR(255) NOT NULL,
    request_count INT UNSIGNED NOT NULL,
    document_size BIGINT UNSIGNED NOT NULL,
    memory_peak BIGINT UNSIGNED NOT NULL,
    memory_footprint BIGINT UNSIGNED NOT NULL,
    timers_count INT UNSIGNED NOT NULL,
    cpu_time FLOAT NOT NULL,
    ru_utime FLOAT NOT NULL,
    ru_stime FLOAT NOT NULL,
    script_time FLOAT NOT NULL,
    req_time FLOAT NOT NULL,
    req_count INT UNSIGNED NOT NULL,
    status INT UNSIGNED NOT NULL,
    memory_footprint_size BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_hostname (hostname),
    KEY idx_server_name (server_name),
    KEY idx_script_name (script_name),
    KEY idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS timer (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    request_id BIGINT UNSIGNED NOT NULL,
    hit_count INT UNSIGNED NOT NULL,
    value FLOAT NOT NULL,
    tag_name VARCHAR(255) NOT NULL,
    tag_value VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY idx_request_id (request_id),
    KEY idx_tag_name (tag_name),
    KEY idx_tag_value (tag_value),
    KEY idx_created_at (created_at),
    FOREIGN KEY (request_id) REFERENCES request(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
EOF

# Start PHP-FPM
php-fpm81 -D

# Keep container running
tail -f /var/log/mysql/error.log 
FROM php:8.4-fpm

# www-data の UID/GID をホストに合わせる
ARG UID=1001
ARG GID=1001
RUN usermod -u ${UID} www-data && groupmod -g ${GID} www-data


# 必要な拡張機能をインストール
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# インポートするための設定
RUN echo "upload_max_filesize = 2G" > /usr/local/etc/php/conf.d/uploads.ini
RUN echo "post_max_size = 2G" >> /usr/local/etc/php/conf.d/uploads.ini
RUN echo "memory_limit = 512MB" >> /usr/local/etc/php/conf.d/uploads.ini

# 作業ディレクトリを設定
WORKDIR /var/www/html

# コンテナのポートを設定（必要に応じて）
EXPOSE 9000

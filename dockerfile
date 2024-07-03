# 使用较旧版本的 PHP 镜像（例如 PHP 5.6）
FROM php:5.6-apache

# 安装 json 扩展
RUN docker-php-ext-install json

# 启用 headers 模块
RUN a2enmod headers

# 添加虚拟主机配置文件
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# 将项目文件复制到容器中
COPY . /var/www/html/

# 设置工作目录
WORKDIR /var/www/html/

# 暴露端口
EXPOSE 80

# 启动 Apache 服务
CMD ["apache2-foreground"]
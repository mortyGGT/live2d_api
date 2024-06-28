# 使用较旧版本的 PHP 镜像（例如 PHP 5.6）
FROM php:5.6-apache

# 安装 json 扩展
RUN docker-php-ext-install json

# 将项目文件复制到容器中
COPY . /CDN/live2d_api/

# 设置工作目录
WORKDIR /CDN/live2d_api/

# 暴露端口
EXPOSE 80
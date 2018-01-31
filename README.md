# xhprof
PHP性能追踪及分析工具xhprof

# 依赖

### 1.xhprof（php扩展）
源码安装
```
cd xhprof/extension
/usr/local/php5.6/bin/phpize
./configure --with-php-config=/usr/local/php5.6/bin/php-config --enable-xhprof
make
make install
```
MAC安装
```
brew search xhprof
brew install xhprof
```

### 2.graphviz (一个绘制图形的工具)
源码安装
```
wget http://www.graphviz.org/pub/graphviz/stable/SOURCES/graphviz-2.24.0.tar.gz
cd graphviz-2.24.0
./configure
make && make install
```
MAC安装
```
brew install graphviz
```
Yum安装
```
yum install -y libpng
yum install -y graphviz
```

# 安装
### 1.项目部署
下载代码到本地虚拟站点，配置conf.php,XhprofData为数据收集目录，我这里定义在项目目录下
```
<?php
defined("XhprofData") or define("XhprofData","/Users/pb/Work/xhprof/data");
```

### 2.优雅的接入现有项目
在 nginx.conf 中添加前置运行文件，为本项目的prepend.php（注：文件路径根据自己项目路径配置）

```
server {
        listen 80;
        server_name localhost;
        
        ...
        
        location ~ \.php$ {
                ...
                fastcgi_param PHP_VALUE "auto_prepend_file=/Users/pb/Work/xhprof/prepend.php";
        }
}
 ```
 
 然后通过 http://localhost/xhprof/xhprof_html/index.php 访问即可
 
 
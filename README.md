# xhprof
PHP性能追踪及分析工具xhprof

# 安装

## 1.xhprof（php扩展）
MAC安装

```
brew install homebrew/php/php56-xhprof
```

## 2.libpng, graphviz (绘制图形的工具)
MAC安装
```
brew install libpng
brew install graphviz
```

## 3.项目部署
下载项目代码到本地，并且配置成虚拟站点，假设我这里目录为（/Users/pb/Work/xhprof）,配置nginx虚拟站点
```
server {
        listen 8055;
        server_name localhost;

        root        /Users/pb/Work/xhprof;
        index       index.php;

        location / {
                try_files $uri $uri/ /index.php$is_args$args;
        }

        location ~ \.php$ {
                include fastcgi_params;
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                fastcgi_pass  127.0.0.1:9000;
        }
}
```

配置/Users/pb/Work/xhprof/conf.php文件, XhprofData常量为数据收集目录
```
<?php
defined("XhprofData") or define("XhprofData","/Users/pb/Work/xhprof/data");

```

## 4.优雅的接入现有项目
在现有项目 nginx.conf 中添加前置运行文件，为本项目的prepend.php（注：auto_prepend_file文件路径根据自己项目路径配置）

```
server {
        listen 80;
        server_name api.pb.com;
        
        ...
        
        location ~ \.php$ {
                ...
                fastcgi_param PHP_VALUE "auto_prepend_file=/Users/pb/Work/xhprof/prepend.php";
        }
}
 ```
 
 ## 5.结果分析
 然后通过 http://localhost:8055/xhprof_html/index.php 访问即可
 
 
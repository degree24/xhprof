# xhprof
PHP性能追踪及分析工具xhprof结果可视化

## 安装 （php5.6）
1.依赖安装

```
xhprof（php扩展）
brew install homebrew/php/php56-xhprof

libpng, graphviz (绘制图形工具)
brew install libpng
brew install graphviz
```

2.部署项目

```
1.克隆项目到本地（这里路径为 /Users/pb/Work/xhprof）
git clone https://github.com/degree757/xhprof.git

2.修改分析数据存储路径，即修改改文件（/Users/pb/Work/xhprof/conf.php）
defined("XhprofData") or define("XhprofData","/Users/pb/Work/xhprof/data");

```

## 优雅的接入现有项目
在自己的nginx站点配置中，添加auto_prepend_file配置，路径根据自己克隆项目路径填写

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

## 可视化
```
1.进入项目 /Users/pb/Work/xhprof, 启动一个虚拟站点
php -S localhost:8757 -t ./

2.访问分析项目站点，即http://localhost:8055/xhprof_html/index.php
```

 
 
# xhprof
php xhprof

# install

## nginx
在 nginx.conf 中添加运行文件（注：文件路径根据自己项目路径配置）


```
server {
        listen 8052;
        server_name localhost;
        
        ...
        
        location ~ \.php$ {
                ...
                fastcgi_param PHP_CALUE "auto_prepend_file=/Users/pb/Work/xhprof/prepend.php";
        }
}
 ```
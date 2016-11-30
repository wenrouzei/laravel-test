# laravel-test
laravel test

1. 文章页、评论
2. 自带登录
3. 路由
4. DB
5. 加密
6. GuzzleHttp
等等...

#使用sqlite

1.安装sqlite3

2.database目录下建立database.sqlite文件

3..env文件注释

  ##DB_CONNECTION=mysql
  
  ##DB_HOST=192.168.16.228
  
  ##DB_PORT=3306
  
  ##DB_DATABASE=laravel
  
  ##DB_USERNAME=root
  
  ##DB_PASSWORD=root
    
4.database.php配置文件 'default' => 'sqlite' 

5.php artisan migrate 迁移
  php artisan db:seed 填充

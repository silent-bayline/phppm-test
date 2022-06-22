## PHP-PM お試し

### 手抜きしているので、動作させるには以下を

mysql コンテナの中で

```
apk add mysql-client

mysql -h mysql -u root -p
※パスワードは password

ALTER USER root@'%' IDENTIFIED WITH mysql_native_password BY 'password';
```

ppm コンテナの中で

```
php artisan migrate
```

ブラウザで

```
http://localhost
```

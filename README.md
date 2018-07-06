# Yoyager 项目
> 当前为 `jwt_auth` 分支.(在 voyager 的基础上，集成 [jwt_auth](https://laravel-china.org/articles/13734/using-tymondesignsjwt-auth-to-build-web-and-api-authentication-system) 的功能).


### [1.yoyager 的 Github 地址](https://github.com/the-control-group/voyager)
### [2.yoyager 官方文档](https://voyager.readme.io/docs)
### 3.已经 [安装](https://laravel-china.org/docs/laravel/5.6/installation/1352) 并[搭建](https://laravel-china.org/docs/laravel/5.6/homestead/1355#configuring-homestead)好了 homestead 的开发环境.
### 4.默认的账号及密码:
    * 1.admin账号1
```
email: admin@admin.com
password: password
```

* 2.普通账号2
```$xslt
name:   tian
email:  tian@qq.com
password: 1234567

```

### 5.出现 `Missing storage symlink > symlink(): No such file or directory` 错误
* 1.用 `vagrant ssh` 连接虚拟机后,看到是虚拟机 `/home/vagrant/code/storage` 链接到 mac 的 `public/storage` 地址上所引起的错误：

```$xslt
vagrant@voyager:~/code/public$ ls -al
total 12
drwxr-xr-x 1 vagrant vagrant  320 Jun 11 09:03 .
drwxr-xr-x 1 vagrant vagrant 1120 Jun 11 09:11 ..
drwxr-xr-x 1 vagrant vagrant   96 Jun 11 08:21 css
-rw-r--r-- 1 vagrant vagrant    0 Jun 11 08:21 favicon.ico
-rw-r--r-- 1 vagrant vagrant  593 Jun 11 08:21 .htaccess
-rw-r--r-- 1 vagrant vagrant 1823 Jun 11 08:21 index.php
drwxr-xr-x 1 vagrant vagrant   96 Jun 11 08:21 js
-rw-r--r-- 1 vagrant vagrant   24 Jun 11 08:21 robots.txt
lrwxr-xr-x 1 vagrant vagrant   81 Jun 11 09:03 storage -> /Users/tianzeng/Documents/php_Workplace/GitHub/Laravel/voyager/storage/app/public

```


* [2.解决方法:](https://laracasts.com/discuss/channels/servers/creating-symbolic-link-on-homestead)
    * 1.用 `vagrant ssh` 连接虚拟机后，执行下面的命令:
```$xslt
sudo ln -s /home/vagrant/code/storage/app/public /home/vagrant/code/public/storage

```

* [6.用 MailGun 代收发邮件服务教程](https://devdojo.com/blog/tutorials/sending-emails-with-laravel-and-mailgun)


* 7.问题:
    * 1.如果输入的 token 有误，会显示 `Route [login] not defined.`,应该返回自定义的 `json`.
        * 解决方法:把 `routes/api.php` 和 `app/Http/Controllers/AuthController.php` 中的 `middleware('auth/api')` 改为 `middleware('api')`
    
    
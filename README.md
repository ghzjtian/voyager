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

### [6.用 MailGun 代收发邮件服务教程](https://devdojo.com/blog/tutorials/sending-emails-with-laravel-and-mailgun)

### 7.web 和 api 的 Guard 的位置.
* `web/session` 的是 `Illuminate\Auth\SessionGuard`.
* `api/jwt` 的是 `Tymon\JWTAuth\JWTGuard`.

### 8.已知的问题:
* 1.如果输入的 token 有误，会显示 `{}` 空的 json,应该返回自定义的 `json`.(发现还没理清 auth('api') 的逻辑)
* 2. [web 和 api 的同时认证问题](https://laravel-china.org/articles/13734/using-tymondesignsjwt-auth-to-build-web-and-api-authentication-system)
* 3.单设备登录的问题(还没解决(JWTGuard))
    * (1.想到的思路，还没验证)在数据库中保存一个 user 对应的 token 的值:
        * 1.如果登录时该用户没有 token 在数据库中，就保存一个 token 到数据库中
        * 2.如果登录时有了一个 token 在数据库中,就把数据库中的 token 更新.
        * 3.如果是 refresh 了一个 token ,就记得更新数据库中的 token 。
    
  
  
### JWT 框架的相关的资料:
* 1.[Laravel 使用 JWT 实现 API Auth, 打造用户授权接口](https://laravel-china.org/articles/6216/laravel-uses-jwt-to-implement-api-auth-to-build-user-authorization-interfaces)
  
  
### 9.相关的 `Auth` 的资料
* [1.Laravel 认证原理及完全自定义认证](https://laravel-china.org/articles/3825/laravel-authentication-principle-and-full-custom-authentication)
* [2.JWT 完整使用详解](https://laravel-china.org/articles/10885/full-use-of-jwt)
* [3.使用 Jwt-Auth 实现 API 用户认证以及无痛刷新访问令牌](https://laravel-china.org/articles/7264/using-jwt-auth-to-implement-api-user-authentication-and-painless-refresh-access-token)
* [4.Laravel 5.2 Auth 改用 salt+passwrod 加密验证的实现](https://laravel-china.org/articles/1989/laravel-52-auth-switch-to-saltpasswrod-encryption-authentication)
* [5.Laravel JWT Authentication Tutorial(注册和登录的认证)](https://appdividend.com/2018/02/24/laravel-jwt-authentication-tutorial/#Laravel_JWT_Authentication_Tutorial)
* [6.Multiple Authentication in Laravel 5.4 Natively! (Admins + Users) ](https://www.youtube.com/watch?list=PLwAKR305CRO9S6KVHMJYqZpjPzGPWuQ7Q&v=iKRLrJXNN4M)
* [7.JWT 的介绍1](https://scotch.io/tutorials/the-anatomy-of-a-json-web-token)
* [8.JWT 的介绍2](https://juejin.im/entry/577b7b56a3413100618c2938)
* [9.JWT 字符串的在线解析器](https://jwt.io/)
* [10.Laravel 源码阅读指南 -- 用户认证系统 (基础介绍)](https://laravel-china.org/articles/13504/laravel-source-reading-guide-user-authentication-system-basic-introduction)
* [11.Route 相关(Laravel 源码阅读指南 -- Facades)](https://laravel-china.org/articles/12676/laravel-source-code-reading-guide-facades)






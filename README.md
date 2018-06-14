# Yoyager 项目
> 当前为 `dev2` 分支(在 `dev` 分支的基础上修改).


### [1.yoyager 的 Github 地址](https://github.com/the-control-group/voyager)
### [2.yoyager 官方文档](https://voyager.readme.io/docs)
### 3.已经 [安装](https://laravel-china.org/docs/laravel/5.6/installation/1352) 并[搭建](https://laravel-china.org/docs/laravel/5.6/homestead/1355#configuring-homestead)好了 homestead 的开发环境.

### [4.默认的账号及密码:](#id_password)
### [5.出现 `Missing storage symlink` 问题](#missing_issue)

### [6.导入本地 voyager 包](#voyager_local)

### [7.常见的配置的真实路径](#truely_path)


***
***
***

### 4.默认的账号及密码:<a name="id_password"/>
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

### 5.出现 `Missing storage symlink > symlink(): No such file or directory` 错误<a name="missing_issue"/>

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

***

### 6.导入本地 voyager 包<a name="voyager_local"/>
* [1.Composer 本地路径加载第三方扩展包](https://laravel-china.org/topics/1999/composer-local-path-loading-third-party-extension-pack)
* 2.这样做的目的是为了充分地了解 voyager 的内部结构及做好笔记.
* 3.现在这个项目有两个 git repository , 1.laravel 项目 2.packages 下的 voyager framework 包.
* 4.voyager 的 GitHub 路径为:[https://github.com/ghzjtian/voyager](https://github.com/ghzjtian/voyager)


***

### 7.常见的配置的真实路径<a name="truely_path"/>

* 1.`Voyager::view('voyager::login');`
    * 显示 login 登录页面.真实路径为: packages/voyager/resources/views/login.blade.php
* 2.`href="{{ voyager_asset('images/logo-icon.png') }}`
    *  在 packages/voyager/publishable/assets/image 下 
* 3.`Voyager::setting `
    * 在 packages/voyager/src/Voyager.php 下 
* 4.翻译文件，如  ` {{ __('voyager::generic.dashboard') }}`
    *  翻译文件在 packages/voyager/publishable/lang/en/generic.dashboard 中




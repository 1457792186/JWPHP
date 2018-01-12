<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/12
 * Time: 下午7:22
 */


//composer安装:
复制
php -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');"

复制
php composer-setup.php

复制
php -r "unlink('composer-setup.php');"

执行第一条命令下载下来的 composer-setup.php 脚本将简单地检测 php.ini 中的参数设置，如果某些参数未正确设置则会给出警告；然后下载最新版本的 composer.phar 文件到当前目录。
上述 3 条命令的作用依次是：
下载安装脚本 － composer-setup.php － 到当前目录。
执行安装过程。
删除安装脚本。
局部安装
上述下载 Composer 的过程正确执行完毕后，可以将 composer.phar 文件复制到任意目录（比如项目根目录下），然后通过 php composer.phar 指令即可使用 Composer 了！
全局安装
全局安装是将 Composer 安装到系统环境变量 PATH 所包含的路径下面，然后就能够在命令行窗口中直接执行 composer 命令了。
Mac 或 Linux 系统：
打开命令行窗口并执行如下命令将前面下载的 composer.phar 文件移动到 /usr/local/bin/ 目录下面：
复制
sudo mv composer.phar /usr/local/bin/composer



安装
安装 Composer，你只需要下载 composer.phar 可执行文件。
curl -sS https://getcomposer.org/installer | php


要检查 Composer 是否正常工作，只需要通过 php 来执行 PHAR：
php composer.phar

这将返回给你一个可执行的命令列表。
注意： 你也可以仅执行 --check 选项而无需下载 Composer。 要获取更多的信息请使用 --help。
curl -sS https://getcomposer.org/installer | php -- --help


composer.json：项目安装
要开始在你的项目中使用 Composer，你只需要一个 composer.json 文件。该文件包含了项目的依赖和其它的一些元数据。
这个 JSON format 是很容易编写的。它允许你定义嵌套结构。
关于 require Key
第一件事情（并且往往只需要做这一件事），你需要在 composer.json 文件中指定 require key 的值。你只需要简单的告诉 Composer 你的项目需要依赖哪些包。
{
    "require": {
    "monolog/monolog": "1.0.*"
    }
}
//如七牛云SDK:
//"qiniu/php-sdk": "^7.2"


你可以看到， require 需要一个 包名称 （例如 monolog/monolog） 映射到 包版本 （例如 1.0.*） 的对象。
包名称
包名称由供应商名称和其项目名称构成。通常容易产生相同的项目名称，而供应商名称的存在则很好的解决了命名冲突的问题。它允许两个不同的人创建同样名为 json 的库，而之后它们将被命名为 igorw/json 和 seldaek/json。
这里我们需要引入 monolog/monolog，供应商名称与项目的名称相同，对于一个具有唯一名称的项目，我们推荐这么做。它还允许以后在同一个命名空间添加更多的相关项目。如果你维护着一个库，这将使你可以很容易的把它分离成更小的部分。
包版本
在前面的例子中，我们引入的 monolog 版本指定为 1.0.*。这表示任何从 1.0 开始的开发分支，它将会匹配 1.0.0、1.0.2 或者 1.0.20。
版本约束可以用几个不同的方法来指定


安装依赖包
获取定义的依赖到你的本地项目，只需要调用 composer.phar 运行 install 命令。
php composer.phar install

接着前面的例子，这将会找到 monolog/monolog 的最新版本，并将它下载到 vendor 目录。 这是一个惯例把第三方的代码到一个指定的目录 vendor。如果是 monolog 将会创建 vendor/monolog/monolog 目录。
小技巧： 如果你正在使用Git来管理你的项目， 你可能要添加 vendor 到你的 .gitignore 文件中。 你不会希望将所有的代码都添加到你的版本库中。
另一件事是 install 命令将创建一个 composer.lock 文件到你项目的根目录中






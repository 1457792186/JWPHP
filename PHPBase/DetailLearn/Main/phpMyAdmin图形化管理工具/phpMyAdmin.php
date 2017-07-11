<?php

//下载地址www.phpmyadmin.net

//在浏览器地址栏输入http://localhost/phpMyAdmin/ 进入phpMyAdmin主角面,接下来即可进行MySQL数据库的操作

//见书333后页


/*安装
首先打开终端输入命令：

sudo vim /etc/apache2/httpd.conf

其中有一行是这样的
#LoadModule php5_module libexec/apache2/libphp5.so

将前面的#号去掉。

然后打开系统偏好设置中的共享，将web共享勾上，如下图

重启apache, 命令如下：
sudo apachectl restart




装一个phpMyAdmin. 它是由php开发的，下载地址是：http://www.phpmyadmin.net/home_page/downloads.php

将下载下来的解压放在/Library/WebServer/Documents/目录下，完整的目录为：/Library/WebServer/Documents/phpmyadmin/，那么命令行进入这个目录，

再输入命令：


cp config.sample.inc.php config.inc.php
vim config.inc.php

按照下面进行修改：


$cfg['blowfish_secret'] = '';//用于Cookie加密，随意的长字符串
$cfg['Servers'][$i]['host'] = '127.0.0.1';//MySQL守护程序做了IP绑定

现在可以在浏览器中输入URL:http://localhost/phpmyadmin/

用服名为:root

密码为你设置的密码。

就可以login到mysql的管理界面
*/








































































































































?>
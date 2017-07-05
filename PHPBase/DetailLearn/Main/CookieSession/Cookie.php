<?php
//Cookie
//Cookie 常用于识别用户。Cookie 是服务器留在用户计算机中的小文件。
//每当相同的计算机通过浏览器请求页面时，它同时会发送Cookie。通过 PHP，能够创建并取回Cookie 的值(如上次访问的位置、花费的时间、用户名和密码等)。

//Cookie文本文件的命令格式:
//用户名@网站地址[数字].txt

//Cookie文件夹下,每个Cookie都是一个简单的文本文件,但是大多经过了加密处理。
//但是并非所有浏览器都支持Cookie,而且是明文保存,最好不要敏感的未加密的数据存储到Cookie中

//Cookie的功能:
//1.记录访客的某些信息,如记录用户访问网页的次数,或者记录访客曾经输入的信息等
//2.在页面之间传递变量,浏览器不会保存当前网页上的任何变量信息,若页面被关闭时页面上的所有变量信息将消失,若要传递到下一个页面,可以存储到Cookie读取
//3.将所查看的Internet页存储在Cookie临时文件中,可以提高之后的浏览速度


//语法:setcookie(name, value, expire, path, domain,secure);
/*参数说明,除name外都可选
参数          说明                                  举例
name        Cookie的变量名                          可通过$_COOKIE["cookiename"]调用变量名为cookiename的Cookie
value       Cookie变量的值,存储在客户端               可通过$_COOKIE["values"]获取名为values的值
expire      Cookie的失效时间,                        若不设置失效时间,那么Cookie将永远有效,除非手动删除
            可用time()或mktime()函数获取
path        Cookie在服务器的有效路径                 若设置为"/"则在整个domain内有效,若设置为"/11"则在domain下的/11目录及子目录有效。默认当前目录
domain      Cookie有效域名                          若使用,则对设置域名下的所有子域名有效
secure      Cookie是否通过安全的HTTPS,值为0或1        若为1,则Cookie只能在HTTPS链接上有效;若为0,则在HTTP和HTTPS都有效
*/

//使用setcookie()函数创建Cookie
setcookie("JWCookie","www.baidu.com");
setcookie("JWCookie","www.baidu.com",time()+60);//设置有效时间为60秒
setcookie("JWCookie",$value,time()+3600,"/tm/","bbsclient.com");//设置有效时间为一小时,有效目录为"/tm/",域名为"bbsclient.com"及其子域名



//读取Cookie
//可以通过超全局变量$_COOKIE[]读取浏览器端的Cookie值
if (!isset($_COOKIE["visittime"])){                             //检测Cookie文件是否存在,若不存在
    setcookie("visittime",date("Y-m-d H:i:s"));                 //设置吧一个Cookie变量
    echo "第一次进入网站";
}else{
    echo "上次访问网站的时间为".$_COOKIE["visittime"];            //输出上次访问时间
    setcookie("visittime",date("Y-m-d H:i:s"),time()+60);       //设置保存Cookie失效时间的变量
}

echo "本次访问网站的时间为:".date("Y-m-d H:i:s");         //输出当前访问时间
//若未设置Cookie的失效时间,则关闭浏览器时自动删除Cookie。若设置了,浏览器会记录Cookie数据,只要未到期都可访问



//删除Cookie
//若要在关闭浏览器前删除Cookie文件,可使用setcookie()函数删除;或者在浏览器手动删除

//setcookie()函数删除Cookie
//只需要将第二个参数设置为空并且失效时间小于当前时间即可
setcookie("visittime","",time()-1);//删除Cookie

//手动删除:
//在浏览器,选择"工具"/"Internet选项"命令,打开"Internet选项"对话框,在"常规"选项卡单击"删除Cookies"对话框,单击"确定"按钮,即可


//Cookie生命周期
//若Cookie不设定失效时间,表示生存周期就为浏览器会话的周期,只要关闭IE浏览器,Cookie就会自动消失,称谓会话Cookie,不会保存于硬盘,而是保存在内存
//若设置了失效时间,那么浏览器就会把Cookie存储到硬盘中,再次打开依然有效,直到有效期超时
//浏览器最多存储300个Cookie文件,而且每个Cookie文件最大容量为4KB,每个域名最多支持20个Cookie,达到限制时,会自动随机删除Cookie文件


?>
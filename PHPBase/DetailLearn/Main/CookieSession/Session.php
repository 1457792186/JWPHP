<?php

//Session
//对比Cookie,Session会话文件中保存的数据在PHP脚本中是以变量的形式创建的,创建的会话变量在生命周期(20分钟)中可以被跨页的请求所引用。
//另外Session会话是存储在服务器端的,相对安全,并且不像Cookie那样有存储长度的限制

//Session是指一个终端用户与交互系统进行通信的时间间隔,通常指从进入系统到注销系统所经过的时间
//工作原理:
//当启动一个Session会话时,会产生一个随机并且唯一的session_id,也就是Session的文件名
//此时session_id存储在服务器的内存中,当关闭网页时会自动注销,重新登录此页面,会再次生成一个随机且唯一的id
//功能:
//Session可以记录用户的相关信息,以供用户再次以此身份对Web服务器提交要求时作确认。
//如,在电子商务网站中,通过Session记录用户登录的信息,以后用户所购买的商品,若没有Session,那么用户每进入一个页面,都需要登录一次用户名和密码
//Session适用于存储信息量比较少的情况,如果用户需要存储的信息量相对较少,并且存储内容无需长期存储,那么使用Session把信息存储到服务器比较合适


//创建会话
//创建会话分以下步骤:启动会话->注册会话->使用会话->删除会话

//1.启动会话
//有两种方式
//1.1使用session_start()函数启动会话
//语法:bool session_start(void)
//注意,使用session_start()函数之前浏览器不能有任何输出

//1.2使用session_register()函数为会话创建一个变量来隐含地启动会话
//session_register()函数为会话创建一个变量来隐含地启动会话
//但是要求设置php.ini文件的选项,将register_gobals设置为on,之后重启Apache服务器;并且在PHP5.3之后废除

//2.注册会话
//会话变量被创建后,全部保存在数组$_SESSION中。通过数组$_SESSION创建一个会话变量很容易,只需要给该数组添加一个元素即可

//例子:启动会话,创建一个Session并赋空值
session_start();
$_SESSION["admin"]=null;


//3.使用会话
//首先需要判断会话变量是否存在一个会话ID,若不存在则创建,若已存在,则此会话变量将载入以供用户使用
if (!empty($_SESSION["session_name"])){         //判断会话内容是否为空
    $myValue = $_SESSION["session_name"];       //读取会话内容
}else{
    $myValue = "adminSuer";                     //会话为空
    $_SESSION["session_name"]= $myValue;        //创建Session
}

//4.删除会话
//删除会话分为删除单个会话、删除多个会话、和结束当前会话2种
//4.1删除单个会话
//和数组的操作相同,使用unset(),直接注销$_SESSION数组中的某个元素即可
unset($_SESSION["session_name"]);

//4.2删除多个会话
//即一次性注销所有的会话变量,可以通过一个空的数组赋值给$_SESSION实现
$_SESSION = array();

//4.3结束当前会话
//若整个会话已经结束,首先应该注销掉所有的会话变量,然后使用session_destroy()函数清除,并清空会话中所有资源没彻底销毁Session
session_destroy();





//Session设置失效时间
//1.客户端未禁止Cookie
$time= 60*1;                                //设置Session失效时间
session_set_cookie_params($time);
session_start();                            //初始化Session
$_SESSION['username']='mr';
//session_set_cookie_params();必须在session_start();前调用

//使用setcookie()函数对Session设置失效时间,如,让Session在1分钟后失效,代码如下
session_start();
setcookie(session_name(),session_id(),time()+$time,"/"); //使用session()手动设置Session失效时间
$_SESSION['user'] = 'mr';
//以上代码setcookie()中,session_name是Session的名称,
//session_id是判断客户端用户的标识,因为session_id是随机产生的唯一名称,所以Session是相对安全的
//失效时间和Cookie的失效时间一样,最后一个参数为可选参数,是放置Cookie的路径

//2.客户端禁止Cookie
//当客户端禁止Cookie时,Session页面间传递会失效,解决有4种方法:
//2.1在登录前提醒用户打开Cookie,多数论坛的做法;
//2.2设置php.ini文件中的session.use_trans_sid = 1,或者编译时打开-enable-trans-sid选项,让PHP自动跨页面传递session_id;
//2.3使用GET方法,隐藏表单传递session_id;
//2.4使用文件或数据库存储session_id,在页面间传递手动调用;
//其中2.2方法不常用,因为用户不能修改服务器中的php.ini文件;
//2.3方法不可以使用Cookie设置失效时间,但是登录情况没有变化;
//2.4方法很重要,在企业级网站开发时,若遇到Session文件使服务器速度变慢,就可以使用,后续会说明。

//2.3方法实例
/*Html代码
<form id="form1" name="form1" method="get" action="common.php?<?=session_name();?>=<?=session_id();?>">

</form>
*/
//接收页面头部详细代码:
$sess_name = session_name();            //获取Session名称
$sess_id = $_GET[$sess_name];           //用GET方式取得session_id
session_id($sess_id);                   //关键步骤
session_start();
$_SESSION['admin'] = 'mrsoft';
//说明:Session为请求该页面之后会产生一个session_id,
//如果这时禁止了Cookie就无法传递session_id,在请求下一个页面时会重新产生一个session_id,导致Session在页面间传递失败





//通过Session判断用户的操作权限

//一.首先通过Session判断用户的操作权限
//使用Session实现如何判断用户的操作权限:

//****************************************实例1********************************************
//Html代码见SessionHtml.html文件中实例1

//————设计登录页面,添加一个表单form,应用POST方法传参,
//action指向的数据处理页为default.php,添加一个用户名文本框并命名为user,添加一个密码域文本框并命名为pwd



//PHP代码

//首先使用session_start()初始化Session变量
//然后通过POST方法接受表单元素的值,将获取的用户名和密码分别赋值给Session变量
session_start();
$_SESSION["user"]=$_POST["user"];
$_SESSION["pwd"]=$_POST["pwd"];

//为防止其他用户非法登录本系统,使用if语句对Session变量值进行判断
if ($_SESSION["user"]==""){     //若用户名为空,弹出提示,并跳转到登录页
    echo "<script language='javascript'>alert('请通过正确途径访问本系统');history.back();</script>";
}

//在数据处理页Session.php的导航栏处添加如下代码:     需要在<?php外进行添加,如最后处的附录1(与以下代码相同)
/*
<TABLE align="center" cellspacing="0" cellpadding="0">
    <TR align="center" valign="middle">
        <TD style="WIDTH:140px;COLOR:red;">当前用户:&nbsp;
            <!-- —————————————输出当前登录的用户级别——————————— ></!-->
            <?php
            if ($_SESSION["user"]=="tsoft"&&$_SESSION["pwd"]=="111"){
                echo "管理员";
            }else{
                echo "普通会员";
            }
            ?>
        </TD>
        <TD width="70"><a href="Session.php">博客首页</a></TD>
        <TD width="70">|&nbsp;<a href="Session.php">我的文章</a></TD>
        <TD width="70">|&nbsp;<a href="Session.php">我的相册</a></TD>
        <TD width="70">|&nbsp;<a href="Session.php">音乐在线</a></TD>
        <TD width="70">|&nbsp;<a href="Session.php">修改密码</a></TD>
        <?php
        if ($_SESSION["user"]=="tsoft"&&$_SESSION["pwd"]=="111") {//如果当前用户是管理员
        ?>
        <!-- —————————————如果当前用户是管理员,输出"用户管理"链接——————————— ></!-->
        <TD width="70">|&nbsp;<a href="Session.php">用户管理</a></TD>
        <?php
        }
        ?>
    </TR>
</TABLE>
*/

//
/*
<?php

session_start();            //初始化Session
unset($_SESSION["user"]);   //删除用户名会话变量
unset($_SESSION["pwd"]);    //删除用户密码会话变量
session_destroy();          //删除所有会话变量
header("location:index.php");//跳转到首页

?>
*/

















?>


<!--*********************附录1************************* ></!-->
<TABLE align="center" cellspacing="0" cellpadding="0">
    <TR align="center" valign="middle">
        <TD style="WIDTH:140px;COLOR:red;">当前用户:&nbsp;
            <!-- —————————————输出当前登录的用户级别——————————— ></!-->
            <?php
            if ($_SESSION["user"]=="tsoft"&&$_SESSION["pwd"]=="111"){
                echo "管理员";
            }else{
                echo "普通会员";
            }
            ?>
        </TD>
        <TD width="70"><a href="Session.php">博客首页</a></TD>
        <TD width="70">|&nbsp;<a href="Session.php">我的文章</a></TD>
        <TD width="70">|&nbsp;<a href="Session.php">我的相册</a></TD>
        <TD width="70">|&nbsp;<a href="Session.php">音乐在线</a></TD>
        <TD width="70">|&nbsp;<a href="Session.php">修改密码</a></TD>
        <?php
        if ($_SESSION["user"]=="tsoft"&&$_SESSION["pwd"]=="111") {//如果当前用户是管理员
        ?>
        <!-- —————————————如果当前用户是管理员,输出"用户管理"链接——————————— ></!-->
        <TD width="70">|&nbsp;<a href="Session.php">用户管理</a></TD>
        <?php
        }
        ?>
    </TR>
</TABLE>

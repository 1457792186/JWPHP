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

//1.首先使用session_start()初始化Session变量
//然后通过POST方法接受表单元素的值,将获取的用户名和密码分别赋值给Session变量
session_start();
$_SESSION["user"]=$_POST["user"];
$_SESSION["pwd"]=$_POST["pwd"];

//2.为防止其他用户非法登录本系统,使用if语句对Session变量值进行判断
if ($_SESSION["user"]==""){     //若用户名为空,弹出提示,并跳转到登录页
    echo "<script language='javascript'>alert('请通过正确途径访问本系统');history.back();</script>";
}

//3.在数据处理页Session.php的导航栏处添加如下代码:     需要在<?php外进行添加,如最后处的附录1(与以下代码相同)
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
        <TD width="70">|&nbsp;<a href="safe.php">注销用户</a></TD>
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

//4.添加"注销用户"超链接页safe.php,以下为该页代码
/*
<?php

session_start();            //初始化Session
unset($_SESSION["user"]);   //删除用户名会话变量
unset($_SESSION["pwd"]);    //删除用户密码会话变量
session_destroy();          //删除所有会话变量
header("location:index.php");//跳转到首页

?>
*/









//Session高级应用

//Session临时文件
//在服务器中,如果将所有用户的Session都保存到临时目录中,会降低服务器的安全性和效率,打开服务器存储的站点会非常慢
//在PHP中,使用session_save_path()函数可以解决这个问题
$path = './tmp/';       //设置Session存储路径
session_save_path($path);//存储Session临时文件
session_start();        //初始化Session
$_SESSION["username"] = true;


//Session缓存
//Session缓存是将网页中的内容临时存储到IE客户端Temporary Internet Files文件夹下,并且可以设置缓存时间
//当第一次浏览网页后,页面的部分内容在规定的时间就被临时存储在客户端的临时文件夹中
//这样在下次访问这个页面时,就可以直接读取缓存中的内容,从而提高网站的浏览效率

//Session缓存使用的是session_cache_limiter()函数
//语法:string session_cache_limiter([string cache_limiter])
//参数cache_limiter为public或privite。同时Session缓存并不是指在服务器端而是在客户端缓存,在服务器中没有显示
//缓存时间的设置,使用的是session_cache_expire()
//语法:int session_cache_expire([int new_cache_expire])
//参数cache_expire是Session缓存的时间,单位为分钟
//注意这两个缓存函数需要在session_start();前调用

//Session缓存实例
session_cache_limiter('private');
$cache_limit = session_cache_limiter(); //开启客户端缓存
session_cache_expire(30);
$cache_expire = session_cache_expire(); //设定客户端缓存时间
session_start();



//Session数据库存储
//虽然更改存储文件夹不至于让临时文件夹填满而造成站点瘫痪,但是大量文件查询一个session_id不轻松
//此时可以使用Session数据库存储,也就是PHP中的session_set_save_handler()函数
//语法:bool session_set_save_handler(string open,string close,string read,string write,string destory,string gc)
/*
参数说明
参数                              说明
open(save_path,session_name)     找到Session存储地址,取出变量名称
close()                          不需要参数,关闭数据库
read(key)                        读取Session值,key对应session_id
write(key,data)                  写入数据,data对应设置的Session变量
destory(key)                     注销Session对应Session键值
gc(expiry_time)                  清除过期Session记录
*/
//一般应用参数直接使用变量,但是此函数中的参数为6个函数,而且在调用时只调用函数名称字符串,以下为实例,最后把这些函数封装到类中

//1.封装session_open函数,连接数据库
function _session_open($save_path,$session_name){
    global $handle;     //使用全局部变量,进行存储,之后的方法便于使用

    $handle = mysqli_connect('localhost','root','root') or die('数据库连接失败');//连接数据库
    //语法:mysqli_connect(host,username,password,dbname,port,socket);
    /*
    参数	        描述
    host	    可选。 规定主机名或 IP 地址。
    username	可选。 规定 MySQL 用户名。
    password	可选。 规定 MySQL 密码。
    dbname	    可选。 规定默认使用的数据库。
    port	    可选。 规定尝试连接到 MySQL 服务器的端口号。
    socket	    可选。 规定 socket 或要使用的已命名 pipe。
    */
    mysqli_select_db('db_database1',$handle) or die('数据库中没有此库名');//找到数据库
    return true;
}
//$save_path,$session_name并未用到,可以去除,但是最好加上,以后功能可能会使用

//2.封装session_close函数,关闭数据库连接
function _session_close(){
    global $handle;
    mysqli_close($handle);//关闭数据库
    return true;
}
//MySQL数据库使用完记得关闭

//3.封装session_read函数,查找数据库
function _session_read($key){
    global $handle;             //使用全局部变量连接数据库
    $time = time();             //设定当前时间
    $sql = "select session_data from tb_session where session_key = '$key' and session_time > $time";//查询sql语句
    $result = mysqli_query(sql,$handle);    //查询数据库
    $row = mysqli_fetch_array($result);
    if ($row){
        return ($row['session_data']);
    }else{
        return false;
    }
}


//4.封装session_write函数,写入数据库
function _session_write($key,$data){
    global $handle;             //使用全局部变量连接数据库
    $time = 60*60;             //设定失效时间
    $last_time = time() + $time;//失效时间
    $sql = "select session_data from tb_session where session_key = '$key' and session_time > $last_time";//查询sql语句
    $result = mysqli_query(sql,$handle);    //查询数据库

    if (mysqli_num_rows($result)==0){//没有结果
        $sql = "insert into tb_session values('$key','$data','$last_time')";//插入数据库SQL语句
        $result = mysqli_query(sql,$handle);
    }else{
        $sql = "update tb_session set session_key = '$key',session_data = '$data',session_time=$last_time where session_key = '$key'";//更新数据库SQL语句
        $result = mysqli_query(sql,$handle);
    }

    return ($result);
}


//5.封装session_destroy函数,删除数据库
function _session_destroy($key){
    global $handle;             //使用全局部变量连接数据库
    $sql = "delete from tb_session where session_key = '$key'";//删除SQL语句
    $result= mysqli_query($sql,$handle);
    return ($result);
}


//6.封装session_gc函数,删除数据库过期Session
function _session_gc($expiry_time){
    global $handle;             //使用全局部变量连接数据库
    $last_time = time();        //将$expiry_time赋值为当前时间戳
    $sql = "delete from tb_session where expiry_time < $last_time";//删除SQL语句
    $result= mysqli_query($sql,$handle);
    return ($result);
}



//通过session_set_save_handler()实现Session存储数据库
session_set_save_handler('_session_open','_session_close','_session_read','_session_write','_session_destory','_session_gc');
session_start();


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
        <TD width="70">|&nbsp;<a href="safe.php">注销用户</a></TD>
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

<?php

//****************************************PHP Sessions
//PHP session 变量用于存储有关用户会话的信息，或更改用户会话的设置。Session 变量保存的信息是单一用户的，并且可供应用程序中的所有页面使用。


//****************************************PHP Session 变量
//当运行一个应用程序时，会打开它，做些更改，然后关闭它。这很像一次会话。
//计算机清楚你是谁。它知道你何时启动应用程序，并在何时终止。
//但是在因特网上，存在一个问题：服务器不知道你是谁以及你做什么，这是由于 HTTP 地址不能维持状态。

//通过在服务器上存储用户信息以便随后使用，PHP session 解决了这个问题（比如用户名称、购买商品等）。
//不过，会话信息是临时的，在用户离开网站后将被删除。如果您需要永久储存信息，可以把数据存储在数据库中。
//Session 的工作机制是：为每个访问者创建一个唯一的 id (UID)，并基于这个 UID 来存储变量。UID 存储在 cookie 中，亦或通过 URL 进行传导。



//****************************************开始 PHP Session
//在把用户信息存储到 PHP session 中之前，首先必须启动会话。
//注释：session_start() 函数必须位于 <html> 标签之前：
/*Html使用
<?php session_start(); ?>

<html>
<body>

</body>
</html>
*/
//上面的代码会向服务器注册用户的会话，以便可以开始保存用户信息，同时会为用户会话分配一个 UID

//语法
session_start();



//****************************************存储 Session 变量
//存储和取回 session 变量的正确方法是使用 PHP $_SESSION 变量
/*Html使用
<?php
session_start();
// store session data
$_SESSION['views']=1;
?>

<html>
<body>

<?php
//retrieve session data
echo "Pageviews=". $_SESSION['views'];
?>

</body>
</html>
*/
/*
输出：
Pageviews=1
*/

//语法
session_start();
// store session data
$_SESSION['views']=1;



//在下面的例子中，创建了一个简单的 page-view 计数器。
//isset() 函数检测是否已设置 "views" 变量。如果已设置 "views" 变量，累加计数器。
//如果 "views" 不存在，则创建 "views" 变量，并把它设置为 1
session_start();

if(isset($_SESSION['views']))
    $_SESSION['views']=$_SESSION['views']+1;

else
    $_SESSION['views']=1;
echo "Views=". $_SESSION['views'];

//****************************************终结 Session
//如果希望删除某些 session 数据，可以使用 unset() 或 session_destroy() 函数。
//unset() 函数用于释放指定的 session 变量
unset($_SESSION['views']);
//也可以通过 session_destroy() 函数彻底终结 session
session_destroy();
//注释：session_destroy() 将重置 session，将失去所有已存储的 session 数据


?>
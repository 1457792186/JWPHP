<?php
//PHP 全局变量 - 超全局变量
//这些超全局变量是：
//$GLOBALS
//$_SERVER
//$_REQUEST
//$_POST
//$_GET
//$_FILES
//$_ENV
//$_COOKIE
//$_SESSION



//1.$GLOBALS — 引用全局作用域中可用的全部变量
//$GLOBALS 这种全局变量用于在 PHP 脚本中的任意位置访问全局变量（从函数或方法中均可）。
//PHP 在名为 $GLOBALS[index] 的数组中存储了所有全局变量。变量的名字就是数组的键。
//下面的例子展示了如何使用超级全局变量 $GLOBALS：
$x = 75;
$y = 25;

function addition() {
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

addition();
echo $z;
//在上面的例子中，由于 z 是 $GLOBALS 数组中的变量，因此在函数之外也可以访问它。



//2.PHP $_SERVER
//$_SERVER 这种超全局变量保存关于报头、路径和脚本位置的信息。
//下面的例子展示了如何使用 $_SERVER 中的某些元素：
echo $_SERVER['PHP_SELF'];
echo "\n";
echo $_SERVER['SERVER_NAME'];
echo "\n";
echo $_SERVER['HTTP_HOST'];
echo "\n";
echo $_SERVER['HTTP_REFERER'];
echo "\n";
echo $_SERVER['HTTP_USER_AGENT'];
echo "\n";
echo $_SERVER['SCRIPT_NAME'];
//下表列出了能够在 $_SERVER 中访问的最重要的元素：
/*
元素/代码	                                    描述
$_SERVER['PHP_SELF']	                    返回当前执行脚本的文件名。
$_SERVER['GATEWAY_INTERFACE']	            返回服务器使用的 CGI 规范的版本。
$_SERVER['SERVER_ADDR']	                    返回当前运行脚本所在的服务器的 IP 地址。
$_SERVER['SERVER_NAME']	                    返回当前运行脚本所在的服务器的主机名（比如 www.w3school.com.cn）。
$_SERVER['SERVER_SOFTWARE']	                返回服务器标识字符串（比如 Apache/2.2.24）。
$_SERVER['SERVER_PROTOCOL']	                返回请求页面时通信协议的名称和版本（例如，“HTTP/1.0”）。
$_SERVER['REQUEST_METHOD']	                返回访问页面使用的请求方法（例如 POST）。
$_SERVER['REQUEST_TIME']	                返回请求开始时的时间戳（例如 1577687494）。
$_SERVER['QUERY_STRING']                	返回查询字符串，如果是通过查询字符串访问此页面。
$_SERVER['HTTP_ACCEPT']                  	返回来自当前请求的请求头。
$_SERVER['HTTP_ACCEPT_CHARSET']	            返回来自当前请求的 Accept_Charset 头（ 例如 utf-8,ISO-8859-1）
$_SERVER['HTTP_HOST']	                    返回来自当前请求的 Host 头。
$_SERVER['HTTP_REFERER']	                返回当前页面的完整 URL（不可靠，因为不是所有用户代理都支持）。
$_SERVER['HTTPS']	                        是否通过安全 HTTP 协议查询脚本。
$_SERVER['REMOTE_ADDR']	                    返回浏览当前页面的用户的 IP 地址。
$_SERVER['REMOTE_HOST']	                    返回浏览当前页面的用户的主机名。
$_SERVER['REMOTE_PORT']                 	返回用户机器上连接到 Web 服务器所使用的端口号。
$_SERVER['SCRIPT_FILENAME']	                返回当前执行脚本的绝对路径。
$_SERVER['SERVER_ADMIN']                	该值指明了 Apache 服务器配置文件中的 SERVER_ADMIN 参数。
$_SERVER['SERVER_PORT']	Web                 服务器使用的端口。默认值为 “80”。
$_SERVER['SERVER_SIGNATURE']	            返回服务器版本和虚拟主机名。
$_SERVER['PATH_TRANSLATED']	                当前脚本所在文件系统（非文档根目录）的基本路径。
$_SERVER['SCRIPT_NAME']	                    返回当前脚本的路径。
$_SERVER['SCRIPT_URI']	                    返回当前页面的 URI。
*/



//3.PHP $_REQUEST
//PHP $_REQUEST 用于收集 HTML 表单提交的数据。
//下面的例子展示了一个包含输入字段及提交按钮的表单。
//当用户通过点击提交按钮来提交表单数据时, 表单数据将发送到 <form> 标签的 action 属性中指定的脚本文件。
//在这个例子中，指定文件本身来处理表单数据。
//如果需要使用其他的 PHP 文件来处理表单数据，请修改为选择的文件名即可。
//然后，可以使用超级全局变量 $_REQUEST 来收集 input 字段的值：
/*
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
</form>
*/
$name = $_REQUEST['fname'];
echo $name;




//4.PHP $_POST
//PHP $_POST 广泛用于收集提交 method="post" 的 HTML 表单后的表单数据。$_POST 也常用于传递变量。
//下面的例子展示了一个包含输入字段和提交按钮的表单。
//当用户点击提交按钮来提交数据后，表单数据会发送到 <form> 标签的 action 属性中指定的文件。
//在本例中，指定文件本身来处理表单数据。如果希望使用另一个 PHP 页面来处理表单数据，请用更改为选择的文件名。
//然后，可以使用超全局变量 $_POST 来收集输入字段的值：
/*
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
</form>
*/
$name = $_POST['fname'];
echo $name;



//5.PHP $_GET
//PHP $_GET 也可用于收集提交 HTML 表单 (method="get") 之后的表单数据。
//$_GET 也可以收集 URL 中的发送的数据
/*
假设我们有一张页面含有带参数的超链接：
<html>
<body>

<a href="test_get.php?subject=PHP&web=W3school.com.cn">测试 $GET</a>

</body>
</html>
当用户点击链接 "Test $GET"，参数 "subject" 和 "web" 被发送到 "test_get.php"，然后就能够通过 $_GET 在 "test_get.php" 中访问这些值了。
下面的例子是 "test_get.php" 中的代码
*/
echo "Study " . $_GET['subject'] . " at " . $_GET['web'];




?>
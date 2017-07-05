<?php

//****************************************PHP Include 文件
//服务器端包含 (SSI) 用于创建可在多个页面重复使用的函数、页眉、页脚或元素。
//include （或 require）语句会获取指定文件中存在的所有文本/代码/标记，并复制到使用 include 语句的文件中。
//包含文件很有用，如果需要在网站的多张页面上引用相同的 PHP、HTML 或文本的话。

//PHP include 和 require 语句
//通过 include 或 require 语句，可以将 PHP 文件的内容插入另一个 PHP 文件（在服务器执行它之前）。
//include 和 require 语句是相同的，除了错误处理方面：
//require 会生成致命错误（E_COMPILE_ERROR）并停止脚本
//include 只生成警告（E_WARNING），并且脚本会继续
//因此，如果希望继续执行，并向用户输出结果，即使包含文件已丢失，那么使用 include。
//否则，在框架、CMS 或者复杂的 PHP 应用程序编程中，请始终使用 require 向执行流引用关键文件。这有助于提高应用程序的安全性和完整性，在某个关键文件意外丢失的情况下。
//包含文件省去了大量的工作。这意味着您可以为所有页面创建标准页头、页脚或者菜单文件。然后，在页头需要更新时，只需更新这个页头包含文件即可。
//语法
include 'filename';
//或
require 'filename';

//****************************************实例1
//假设有一个名为 "footer.php" 的标准的页脚文件，就像这样
/*
<?php
echo "<p>Copyright © 2006-" . date("Y") . " W3School.com.cn</p>";
?>
*/

//如需在一张页面中引用这个页脚文件，使用 include 语句
/*
<html>
<body>

<h1>欢迎访问我们的首页！</h1>
<?php include 'footer.php';?>

</body>
</html>
*/


//****************************************实例2
//假设有一个名为 "menu.php" 的标准菜单文件
/*
<?php
echo '<a href="/index.asp">首页</a> -
<a href="/html/index.asp">HTML 教程</a> -
<a href="/css/index.asp">CSS 教程</a> -
<a href="/js/index.asp">JavaScript 教程</a> -
<a href="/php/index.asp">PHP 教程</a>';
?>
*/

//网站中的所有页面均使用此菜单文件。具体的做法是（使用了一个 <div> 元素，这样今后就可以轻松地通过 CSS 设置样式）
/*
<html>
<body>

<div class="menu">
<?php include 'menu.php';?>
</div>

<h1>欢迎访问我的首页！</h1>

</body>
</html>
*/


//****************************************实例3
//假设有一个名为 "vars.php" 的文件，其中定义了一些变量
/*
<?php
$color='银色的';
$car='奔驰轿车';
?>
*/

//然后，如果引用这个 "vars.php" 文件，就可以在调用文件中使用这些变量
/*
<html>
<body>

<h1>欢迎访问我的首页！</h1>
<?php
include 'vars.php';
echo "我有一辆" . $color . $car "。";
?>

</body>
</html>
*/



//****************************************PHP include vs. require
//require 语句同样用于向 PHP 代码中引用文件。

//不过，include 与 require 有一个巨大的差异：如果用 include 语句引用某个文件并且 PHP 无法找到它，脚本会继续执行
//实例
/*
<html>
<body>

<h1>Welcome to my home page!</h1>
<?php
include 'noFileExists.php';
echo "I have a $color $car.";
?>

</body>
</html>
*/

//如果使用 require 语句完成相同的案例，echo 语句不会继续执行，因为在 require 语句返回严重错误之后脚本就会终止执行
//实例
/*
<html>
<body>

<h1>Welcome to my home page!</h1>
<?php
require 'noFileExists.php';
echo "I have a $color $car.";
?>

</body>
</html>
*/

//注释：
//请在此时使用 require：当文件被应用程序请求时。
//请在此时使用 include：当文件不是必需的，且应用程序在文件未找到时应该继续运行时。

?>
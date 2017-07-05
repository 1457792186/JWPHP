<?php
//**********************************PHP 表单验证
//PHP 表单验证
//提示：在处理 PHP 表单时请重视安全性！
//这些页面将展示如何安全地处理 PHP 表单。对 HTML 表单数据进行适当的验证对于防范黑客和垃圾邮件很重要！
//稍后使用的 HTML 表单包含多种输入字段：必需和可选的文本字段、单选按钮以及提交按钮：

//**********************************
//下面的表单使用如下验证规则：
/*
字段	        验证规则
Name	    必需。必须包含字母和空格。
E-mail	    必需。必须包含有效的电子邮件地址（包含 @ 和 .）。
Website	    可选。如果选填，则必须包含有效的 URL。
Comment	    可选。多行输入字段（文本框）。
Gender	    必需。必须选择一项。
*/

//首先看一下这个表单的纯 HTML 代码：
//文本字段
//name、email 和 website 属于文本输入元素，comment 字段是文本框。HTML 代码是这样的：
/*
Name: <input type="text" name="name">
    E-mail: <input type="text" name="email">
    Website: <input type="text" name="website">
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
*/

//单选按钮
//gender 字段是单选按钮，HTML 代码是这样的：
/*
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
*/


//表单元素
//表单的 HTML 代码是这样的：
/*
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
*/
//当提交此表单时，通过 method="post" 发送表单数据。

//什么是 $_SERVER["PHP_SELF"] 变量？
//$_SERVER["PHP_SELF"] 是一种超全局变量，它返回当前执行脚本的文件名。
//因此，$_SERVER["PHP_SELF"] 将表单数据发送到页面本身，而不是跳转到另一张页面。这样，用户就能够在表单页面获得错误提示信息。

//什么是 htmlspecialchars() 函数？
//htmlspecialchars() 函数把特殊字符转换为 HTML 实体。这意味着 < 和 > 之类的 HTML 字符会被替换为 &lt; 和 &gt;
// 这样可防止攻击者通过在表单中注入 HTML 或 JavaScript 代码（跨站点脚本攻击）对代码进行利用。

//关于 PHP 表单安全性的重要提示
//$_SERVER["PHP_SELF"] 变量能够被黑客利用！
//如果页面使用了 PHP_SELF，用户能够输入下划线然后执行跨站点脚本（XSS）。

//提示：跨站点脚本（Cross-site scripting，XSS）是一种计算机安全漏洞类型，常见于 Web 应用程序。XSS 能够使攻击者向其他用户浏览的网页中输入客户端脚本。
//假设一张名为 "test_form.php" 的页面中有如下表单：
/*
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
现在，如果用户进入的是地址栏中正常的 URL："http://www.example.com/test_form.php"，上面的代码会转换为：
<form method="post" action="test_form.php">
    到目前，一切正常。
不过，如果用户在地址栏中键入了如下 URL：
http://www.example.com/test_form.php/%22%3E%3Cscript%3Ealert('hacked')%3C/script%3E
在这种情况下，上面的代码会转换为：
<form method="post" action="test_form.php"/><script>alert('hacked')</script>
这段代码加入了一段脚本和一个提示命令。并且当此页面加载后，就会执行 JavaScript 代码（用户会看到一个提示框）。这仅仅是一个关于 PHP_SELF 变量如何被利用的简单无害案例。
应该意识到 <script> 标签内能够添加任何 JavaScript 代码！
黑客能够把用户重定向到另一台服务器上的某个文件，该文件中的恶意代码能够更改全局变量或将表单提交到其他地址以保存用户数据，等等。
*/

//如果避免 $_SERVER["PHP_SELF"] 被利用？
//通过使用 htmlspecialchars() 函数能够避免 $_SERVER["PHP_SELF"] 被利用。
//表单代码是这样的：
/*
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
htmlspecialchars() 函数把特殊字符转换为 HTML 实体。现在，如果用户试图利用 PHP_SELF 变量，会导致如下输出：
<form method="post" action="test_form.php/"><script>alert('hacked')</script>">
无法利用，没有危害！
*/

//通过 PHP 验证表单数据
//要做的第一件事是通过 PHP 的 htmlspecialchars() 函数传递所有变量。
/*
在使用 htmlspecialchars() 函数后，如果用户试图在文本字段中提交以下内容：
<script>location.href('http://www.hacked.com')</script>
- 代码不会执行，因为会被保存为转义代码，就像这样：
&lt;script&gt;location.href('http://www.hacked.com')&lt;/script&gt;
现在这条代码显示在页面上或 e-mail 中是安全的。
在用户提交该表单时，还要做两件事：
（通过 PHP trim() 函数）去除用户输入数据中不必要的字符（多余的空格、制表符、换行）
（通过 PHP stripslashes() 函数）删除用户输入数据中的反斜杠（\）
*/

//接下来创建一个检查函数（相比一遍遍地写代码，这样效率更好）。
//把函数命名为 test_input()。
//现在，能够通过 test_input() 函数检查每个 $_POST 变量，脚本是这样的：
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $website = test_input($_POST["website"]);
    $comment = test_input($_POST["comment"]);
    $gender = test_input($_POST["gender"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//请注意在脚本开头，检查表单是否使用 $_SERVER["REQUEST_METHOD"] 进行提交。
//如果 REQUEST_METHOD 是 POST，那么表单已被提交 - 并且应该对其进行验证。如果未提交，则跳过验证并显示一个空白表单。
//不过，在上面的例子中，所有输入字段都是可选的。即使用户未输入任何数据，脚本也能正常工作。
//下一步是制作必填输入字段，并创建需要时使用的错误消息。


?>
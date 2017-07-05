<?php
//**********************************PHP 表单验证 - 验证 E-mail 和 URL

//**********************************PHP - 验证名字
//以下代码展示的简单方法检查 name 字段是否包含字母和空格。如果 name 字段无效，则存储一条错误消息：
$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $nameErr = "只允许字母和空格！";
}
//注释：preg_match() 函数检索字符串的模式，如果模式存在则返回 true，否则返回 false。


//**********************************PHP - 验证 E-mail
//以下代码展示的简单方法检查 e-mail 地址语法是否有效。如果无效则存储一条错误消息
$email = test_input($_POST["email"]);
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
    $emailErr = "无效的 email 格式！";
}


//**********************************PHP - 验证 URL
//以下代码展示的方法检查 URL 地址语法是否有效（这条正则表达式同时允许 URL 中的斜杠）。如果 URL 地址语法无效，则存储一条错误消息
$website = test_input($_POST["website"]);
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%
=~_|]/i",$website)) {
    $websiteErr = "无效的 URL";
}


//**********************************PHP - 验证 Name、E-mail、以及 URL
// 定义变量并设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // 检查名字是否包含字母和空格
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // 检查电邮地址语法是否有效
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // 检查 URL 地址语言是否有效（此正则表达式同样允许 URL 中的下划线）
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%
    =~_|]/i",$website)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}


?>
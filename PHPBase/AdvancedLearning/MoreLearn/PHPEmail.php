<?php

//****************************************PHP 发送电子邮件
//PHP 允许从脚本直接发送电子邮件

//****************************************PHP mail() 函数
//PHP mail() 函数用于从脚本中发送电子邮件
/*
参数	        描述
to	        必需。规定 email 接收者。
subject	    必需。规定 email 的主题。注释：该参数不能包含任何新行字符。
message	    必需。定义要发送的消息。应使用 LF (\n) 来分隔各行。
headers	    可选。规定附加的标题，比如 From、Cc 以及 Bcc。
            应当使用 CRLF (\r\n) 分隔附加的标题。
parameters	可选。对邮件发送程序规定额外的参数。
*/
//注释：PHP 需要一个已安装且正在运行的邮件系统，以便使邮件函数可用。所用的程序通过在 php.ini 文件中的配置设置进行定义
//语法
mail(to,subject,message,headers,parameters)


//****************************************PHP 简易 E-Mail
//通过 PHP 发送电子邮件的最简单的方式是发送一封文本 email。
//在下面的例子中，首先声明变量($to, $subject, $message, $from, $headers)，然后在 mail() 函数中使用这些变量来发送了一封 e-mail：
$to = "someone@example.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "someonelse@example.com";
$headers = "From: $from";
mail($to,$subject,$message,$headers);
echo "Mail Sent.";


//****************************************PHP Mail Form
//通过 PHP，能够在自己的站点制作一个反馈表单。下面的例子向指定的 e-mail 地址发送了一条文本消息(结合了PHP)
if (isset($_REQUEST['email']))
//if "email" is filled out, send email
{
    //send email
    $email = $_REQUEST['email'] ;
    $subject = $_REQUEST['subject'] ;
    $message = $_REQUEST['message'] ;
    mail( "someone@example.com", "Subject: $subject",
        $message, "From: $email" );
    echo "Thank you for using our mail form";
}
else
//if "email" is not filled out, display the form
{
    echo "<form method='post' action='mailform.php'>
  Email: <input name='email' type='text' /><br />
  Subject: <input name='subject' type='text' /><br />
  Message:<br />
  <textarea name='message' rows='15' cols='40'>
  </textarea><br />
  <input type='submit' />
  </form>";
}
//例子解释：
//首先，检查是否填写了邮件输入框
//如果未填写（比如在页面被首次访问时），输出 HTML 表单
//如果已填写（在表单被填写后），从表单发送邮件
//当点击提交按钮后，重新载入页面，显示邮件发送成功的消息


?>
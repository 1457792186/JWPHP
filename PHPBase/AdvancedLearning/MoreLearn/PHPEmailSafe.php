<?php

//****************************************PHP 安全的电子邮件


//****************************************PHP E-mail 注入(结合PHP)
if (isset($_REQUEST['email']))
//if "email" is filled out, send email
{
    //send email
    $email = $_REQUEST['email'] ;
    $subject = $_REQUEST['subject'] ;
    $message = $_REQUEST['message'] ;
    mail("someone@example.com", "Subject: $subject",
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
//以上代码存在的问题是，未经授权的用户可通过输入表单在邮件头部插入数据
//假如用户在表单中的输入框内加入这些文本，会出现什么情况呢？
//someone@example.com%0ACc:person2@example.com
//%0ABcc:person3@example.com,person3@example.com,
//anotherperson4@example.com,person5@example.com
//%0ABTo:person6@example.com
//与往常一样，mail() 函数把上面的文本放入邮件头部，那么现在头部有了额外的 Cc:, Bcc: 以及 To: 字段。当用户点击提交按钮时，这封 e-mail 会被发送到上面所有的地址


//****************************************PHP 防止 E-mail 注入
//防止 e-mail 注入的最好方法是对输入进行验证
//增加了检测表单中 email 字段的输入验证程序
function spamcheck($field)
{
    //filter_var() sanitizes the e-mail
    //address using FILTER_SANITIZE_EMAIL
    $field=filter_var($field, FILTER_SANITIZE_EMAIL);

    //filter_var() validates the e-mail
    //address using FILTER_VALIDATE_EMAIL
    if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

if (isset($_REQUEST['email']))
{//if "email" is filled out, proceed

    //check if the email address is invalid
    $mailcheck = spamcheck($_REQUEST['email']);
    if ($mailcheck==FALSE)
    {
        echo "Invalid input";
    }
    else
    {//send email
        $email = $_REQUEST['email'] ;
        $subject = $_REQUEST['subject'] ;
        $message = $_REQUEST['message'] ;
        mail("someone@example.com", "Subject: $subject",
            $message, "From: $email" );
        echo "Thank you for using our mail form";
    }
}
else
{//if "email" is not filled out, display the form
    echo "<form method='post' action='mailform.php'>
  Email: <input name='email' type='text' /><br />
  Subject: <input name='subject' type='text' /><br />
  Message:<br />
  <textarea name='message' rows='15' cols='40'>
  </textarea><br />
  <input type='submit' />
  </form>";
}
//在上面的代码中，使用了 PHP 过滤器来对输入进行验证：
//FILTER_SANITIZE_EMAIL 从字符串中删除电子邮件的非法字符
//FILTER_VALIDATE_EMAIL 验证电子邮件地址


?>
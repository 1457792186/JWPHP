<?php
//**********************************PHP 表单验证 - 完成表单实例
//PHP - 保留表单中的值
//如需在用户点击提交按钮后在输入字段中显示值，在以下输入字段的 value 属性中增加了一小段 PHP 脚本：name、email 以及 website。
//在 comment 文本框字段中，把脚本放到了 <textarea> 与 </textarea> 之间。这些脚本输出 $name、$email、$website 和 $comment 变量的值。
//然后，还需要显示选中了哪个单选按钮。对此，必须操作 checked 属性（而非单选按钮的 value 属性）：
/*
Name: <input type="text" name="name" value="<?php echo $name;?>">

E-mail: <input type="text" name="email" value="<?php echo $email;?>">

Website: <input type="text" name="website" value="<?php echo $website;?>">

Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>

Gender:

<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
*/


//**********************************完整的表单实例
//下面是 PHP 表单验证实例的完整代码
/*

<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// 定义变量并设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "姓名是必填的";
   } else {
     $name = test_input($_POST["name"]);
     // 检查姓名是否包含字母和空白字符
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "只允许字母和空格";
     }
   }

   if (empty($_POST["email"])) {
     $emailErr = "电邮是必填的";
   } else {
     $email = test_input($_POST["email"]);
     // 检查电子邮件地址语法是否有效
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $emailErr = "无效的 email 格式";
     }
   }

   if (empty($_POST["website"])) {
     $website = "";
   } else {
     $website = test_input($_POST["website"]);
     // 检查 URL 地址语法是否有效（正则表达式也允许 URL 中的斜杠）
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
       $websiteErr = "无效的 URL";
     }
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "性别是必选的";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP 验证实例</h2>
<p><span class="error">* 必需的字段</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   姓名：<input type="text" name="name">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   电邮：<input type="text" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   网址：<input type="text" name="website">
   <span class="error"><?php echo $websiteErr;?></span>
   <br><br>
   评论：<textarea name="comment" rows="5" cols="40"></textarea>
   <br><br>
   性别：
   <input type="radio" name="gender" value="female">女性
   <input type="radio" name="gender" value="male">男性
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="提交">
</form>

<?php
echo "<h2>您的输入：</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</body>
</html>

*/



?>
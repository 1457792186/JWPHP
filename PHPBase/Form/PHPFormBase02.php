<?php
//**********************************PHP 表单验证 - 必填字段

//PHP - 输入字段
//从上一节中的验证规则中，看到 "Name", "E-mail" 以及 "Gender" 字段是必需的。这些字段不能为空且必须在 HTML 表单中填写。
/*
字段	        验证规则
Name	    必需。必须包含字母和空格。
E-mail	    必需。必须包含有效的电子邮件地址（包含 @ 和 .）。
Website	    可选。如果选填，则必须包含有效的 URL。
Comment	    可选。多行输入字段（文本框）。
Gender  	必需。必须选择一项。
*/
//在下面的代码中增加了一些新变量：$nameErr、$emailErr、$genderErr 以及 $websiteErr。
//这些错误变量会保存被请求字段的错误消息。还为每个 $_POST 变量添加了一个 if else 语句。
//这条语句检查 $_POST 变量是否为空（通过 PHP empty() 函数）。
//如果为空，则错误消息会存储于不同的错误变量中。如果不为空，则通过 test_input() 函数发送用户输入数据：
// 定义变量并设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
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

//PHP - 显示错误消息
//在 HTML 表单中，在每个被请求字段后面增加了一点脚本。如果需要，会生成恰当的错误消息（如果用户未填写必填字段就试图提交表单）：
/*
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <input type="text" name="name">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
E-mail:
<input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Website:
<input type="text" name="website">
<span class="error"><?php echo $websiteErr;?></span>
<br><br>
<label>Comment: <textarea name="comment" rows="5" cols="40"></textarea>
<br><br>
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">

</form>
*/



?>
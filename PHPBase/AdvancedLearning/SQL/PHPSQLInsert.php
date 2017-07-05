<?php
//*************************************PHP MySQL Insert Into
//INSERT INTO 语句用于向数据库表中插入新记录


//*************************************向数据库表插入数据
//INSERT INTO 语句用于向数据库表添加新记录

//语法
INSERT INTO table_name
VALUES (value1, value2,....)

//还可以规定希望在其中插入数据的列：
INSERT INTO table_name (column1, column2,...)
VALUES (value1, value2,....)

//注释：SQL 语句对大小写不敏感。INSERT INTO 与 insert into 相同。
//为了让 PHP 执行该语句，必须使用 mysql_query() 函数。该函数用于向 MySQL 连接发送查询或命令。


//*************************************例子
//在PHPSQLCreate，创建了一个名为 "Persons" 的表，有三个列："Firstname", "Lastname" 以及 "Age"。
//将在本例中使用同样的表。下面的例子向 "Persons" 表添加了两个新记录
$con = mysql_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db", $con);

mysql_query("INSERT INTO Persons (FirstName, LastName, Age) 
VALUES ('Peter', 'Griffin', '35')");

mysql_query("INSERT INTO Persons (FirstName, LastName, Age) 
VALUES ('Glenn', 'Quagmire', '33')");

mysql_close($con);


//*************************************把来自表单的数据插入数据库
//现在，创建一个 HTML 表单，这个表单可把新记录插入 "Persons" 表。
//这是这个 HTML 表单
/*
<html>
<body>

<form action="insert.php" method="post">
Firstname: <input type="text" name="firstname" />
Lastname: <input type="text" name="lastname" />
Age: <input type="text" name="age" />
<input type="submit" />
</form>

</body>
</html>
*/

//当用户点击上例中 HTML 表单中的提交按钮时，表单数据被发送到 "insert.php"。
//"insert.php" 文件连接数据库，并通过 $_POST 变量从表单取回值。
//然后，mysql_query() 函数执行 INSERT INTO 语句，一条新的记录会添加到数据库表中。
//下面是 "insert.php" 页面的代码：
$con = mysql_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db", $con);

$sql="INSERT INTO Persons (FirstName, LastName, Age)
VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";

if (!mysql_query($sql,$con))
{
    die('Error: ' . mysql_error());
}
echo "1 record added";

mysql_close($con)


?>
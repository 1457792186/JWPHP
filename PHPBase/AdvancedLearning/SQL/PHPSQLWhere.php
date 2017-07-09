<?php
//*************************************PHP MySQL Where 子句
//如需选取匹配指定条件的数据，请向 SELECT 语句添加 WHERE 子句


//*************************************WHERE 子句
//如需选取匹配指定条件的数据，请向 SELECT 语句添加 WHERE 子句。

//语法
SELECT column FROM table
WHERE column operator value

//下面的运算符可与 WHERE 子句一起使用
/*
运算符	    说明
=	        等于
!=	        不等于
>	        大于
<	        小于
>=	        大于或等于
<=	        小于或等于
BETWEEN	    介于一个包含范围内
LIKE	    搜索匹配的模式
*/

//注释：SQL 语句对大小写不敏感。WHERE 与 where 等效。
//为了让 PHP 执行上面的语句，必须使用 mysqli_query() 函数。该函数用于向 SQL 连接发送查询和命令


//*************************************例子
//下面的例子将从 "Persons" 表中选取所有 FirstName='Peter' 的行
$con = mysqli_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db("my_db", $con);

$result = mysqli_query("SELECT * FROM Persons
WHERE FirstName='Peter'");

while($row = mysqli_fetch_array($result))
{
    echo $row['FirstName'] . " " . $row['LastName'];
    echo "<br />";
}
/*
以上代码的输出：
Peter Griffin
*/



?>
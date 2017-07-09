<?php
//*************************************PHP MySQL Delete From
//DELETE FROM 语句用于从数据库表中删除行


//*************************************删除数据库中的数据
//DELETE FROM 语句用于从数据库表中删除记录。

//语法
DELETE FROM table_name
WHERE column_name = some_value
//注释：SQL 对大小写不敏感。DELETE FROM 与 delete from 等效。
//为了让 PHP 执行上面的语句，必须使用 mysqli_query( 函数。该函数用于向 SQL 连接发送查询和命令。


//*************************************例子
//稍早时，创建了一个名为 "Persons" 的表。它看起来类似这样
/*
FirstName	    LastName    	Age
Peter	       Griffin      	35
Glenn	      Quagmire      	33
*/

//下面的例子删除 "Persons" 表中所有 LastName='Griffin' 的记录
$con = mysqli_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db("my_db", $con);

mysqli_query("DELETE FROM Persons WHERE LastName='Griffin'");

mysqli_close($con);

//在这次删除之后，表是这样的
/*
FirstName	LastName	Age
Glenn	    Quagmire	33
*/



?>
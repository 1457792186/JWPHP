<?php
//*************************************PHP MySQL Update
//UPDATE 语句用于中修改数据库表中的数据


//*************************************更新数据库中的数据
//UPDATE 语句用于在数据库表中修改数据

//语法
UPDATE table_name
SET column_name = new_value
WHERE column_name = some_value
//注释：SQL 对大小写不敏感。UPDATE 与 update 等效。
//为了让 PHP 执行上面的语句，必须使用 mysql_query( 函数。该函数用于向 SQL 连接发送查询和命令



//*************************************例子
//稍早时，创建了一个名为 "Persons" 的表。它看起来类似这样
/*
FirstName	    LastName    	Age
Peter	       Griffin      	35
Glenn	      Quagmire      	33
*/
//下面的例子更新 "Persons" 表的一些数据
$con = mysql_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db", $con);

mysql_query("UPDATE Persons SET Age = '36'
WHERE FirstName = 'Peter' AND LastName = 'Griffin'");

mysql_close($con);

//在这次更新后，"Persons" 表格是这样的
/*
FirstName   	LastName	    Age
Peter       	Griffin     	36
Glenn	        Quagmire	    33
*/


?>
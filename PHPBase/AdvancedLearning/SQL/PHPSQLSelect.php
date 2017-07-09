<?php
//*************************************PHP MySQL Select
//SELECT 语句用于从数据库中选取数据


//*************************************从数据库表中选取数据
//SELECT 语句用于从数据库中选取数据。

//语法
SELECT column_name(s) FROM table_name
//注释：SQL 语句对大小写不敏感。SELECT 与 select 等效。
//为了让 PHP 执行上面的语句，必须使用 mysqli_query() 函数。该函数用于向 MySQL 发送查询或命令


//*************************************例子
//下面的例子选取存储在 "Persons" 表中的所有数据（* 字符选取表中所有数据）
$con = mysqli_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db("my_db", $con);

$result = mysqli_query("SELECT * FROM Persons");

while($row = mysqli_fetch_array($result))
{
    echo $row['FirstName'] . " " . $row['LastName'];
    echo "<br />";
}

mysqli_close($con);
//上面这个例子在 $result 变量中存放由 mysqli_query() 函数返回的数据。
//接下来，使用 mysqli_fetch_array() 函数以数组的形式从记录集返回第一行。
//每个随后对 mysqli_fetch_array() 函数的调用都会返回记录集中的下一行。
// while loop 语句会循环记录集中的所有记录。
//为了输出每行的值，使用了 PHP 的 $row 变量 ($row['FirstName'] 和 $row['LastName'])
/*
以上代码的输出：
Peter Griffin
Glenn Quagmire
*/


//在 HTML 表格中显示结果
//下面的例子选取的数据与上面的例子相同，但是将把数据显示在一个 HTML 表格中
$con = mysqli_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db("my_db", $con);

$result = mysqli_query("SELECT * FROM Persons");

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
/*
以上代码的输出：
Firstname	Lastname
Glenn   	Quagmire
Peter	    Griffin
*/



?>
<?php
//*************************************PHP MySQL Order By 关键词
//ORDER BY 关键词用于对记录集中的数据进行排序


//*************************************ORDER BY 关键词
//ORDER BY 关键词用于对记录集中的数据进行排序。

//语法
SELECT column_name(s)
FROM table_name
ORDER BY column_name
//注释：SQL 对大小写不敏感。ORDER BY 与 order by 等效


//*************************************例子
//下面的例子选取 "Persons" 表中的存储的所有数据，并根据 "Age" 列对结果进行排序
$con = mysql_connect("localhost","peter","abc123");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("my_db", $con);

$result = mysql_query("SELECT * FROM Persons ORDER BY age");

while($row = mysql_fetch_array($result))
{
    echo $row['FirstName'];
    echo " " . $row['LastName'];
    echo " " . $row['Age'];
    echo "<br />";
}

mysql_close($con);
/*
以上代码的输出：
Glenn Quagmire 33
Peter Griffin 35
*/



//*************************************升序或降序的排序
//如果使用 ORDER BY 关键词，记录集的排序顺序默认是升序（1 在 9 之前，"a" 在 "p" 之前）。
//请使用 DESC 关键词来设定降序排序（9 在 1 之前，"p" 在 "a" 之前）
SELECT column_name(s)
FROM table_name
ORDER BY column_name DESC



//*************************************根据两列进行排序
//可以根据多个列进行排序。当按照多个列进行排序时，只有第一列相同时才使用第二列
SELECT column_name(s)
FROM table_name
ORDER BY column_name1, column_name2




?>
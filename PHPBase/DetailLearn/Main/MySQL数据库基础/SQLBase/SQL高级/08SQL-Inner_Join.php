<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL INNER JOIN 关键字

//SQL INNER JOIN 关键字
//在表中存在至少一个匹配时，INNER JOIN 关键字返回行

//INNER JOIN 关键字语法
SELECT column_name(s)
FROM table_name1
INNER JOIN table_name2
ON table_name1.column_name=table_name2.column_name

//注释：INNER JOIN 与 JOIN 是相同的

//内连接（INNER JOIN）实例
//现在，希望列出所有人的定购。
//可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
INNER JOIN Orders
ON Persons.Id_P=Orders.Id_P
ORDER BY Persons.LastName

//INNER JOIN 关键字在表中存在至少一个匹配时返回行。如果 "Persons" 中的行在 "Orders" 中没有匹配，就不会列出这些行。

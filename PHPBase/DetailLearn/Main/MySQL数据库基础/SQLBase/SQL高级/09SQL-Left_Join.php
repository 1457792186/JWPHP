<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL LEFT JOIN 关键字

//SQL LEFT JOIN 关键字
//LEFT JOIN 关键字会从左表 (table_name1) 那里返回所有的行，即使在右表 (table_name2) 中没有匹配的行

//LEFT JOIN 关键字语法
SELECT column_name(s)
FROM table_name1
LEFT JOIN table_name2
ON table_name1.column_name=table_name2.column_name
//注释：在某些数据库中， LEFT JOIN 称为 LEFT OUTER JOIN


//左连接（LEFT JOIN）实例
//现在，希望列出所有的人，以及他们的定购 - 如果有的话。
//可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
LEFT JOIN Orders
ON Persons.Id_P=Orders.Id_P
ORDER BY Persons.LastName
//LEFT JOIN 关键字会从左表 (Persons) 那里返回所有的行，即使在右表 (Orders) 中没有匹配的行

/*
结果集：
LastName	FirstName	OrderNo
Adams	    John	    22456
Adams	    John	    24562
Carter	    Thomas	    77895
Carter	    Thomas	    44678
Bush	    George
*/

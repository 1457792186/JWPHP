<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL RIGHT JOIN 关键字

//SQL RIGHT JOIN 关键字
//RIGHT JOIN 关键字会右表 (table_name2) 那里返回所有的行，即使在左表 (table_name1) 中没有匹配的行

//RIGHT JOIN 关键字语法
SELECT column_name(s)
FROM table_name1
RIGHT JOIN table_name2
ON table_name1.column_name=table_name2.column_name
//注释：在某些数据库中， RIGHT JOIN 称为 RIGHT OUTER JOIN

//右连接（RIGHT JOIN）实例
//现在，希望列出所有的定单，以及定购它们的人 - 如果有的话。
//可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
RIGHT JOIN Orders
ON Persons.Id_P=Orders.Id_P
ORDER BY Persons.LastName
//RIGHT JOIN 关键字会从右表 (Orders) 那里返回所有的行，即使在左表 (Persons) 中没有匹配的行

/*
结果集：
LastName	FirstName	OrderNo
Adams	    John	    22456
Adams	    John	    24562
Carter	    Thomas	    77895
Carter	    Thomas	    44678
 	 	                34764
*/
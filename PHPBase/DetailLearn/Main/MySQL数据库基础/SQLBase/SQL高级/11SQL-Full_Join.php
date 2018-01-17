<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL FULL JOIN 关键字

//SQL FULL JOIN 关键字
//只要其中某个表存在匹配，FULL JOIN 关键字就会返回行

//FULL JOIN 关键字语法
SELECT column_name(s)
FROM table_name1
FULL JOIN table_name2
ON table_name1.column_name=table_name2.column_name
//注释：在某些数据库中， FULL JOIN 称为 FULL OUTER JOIN


//全连接（FULL JOIN）实例
//现在，希望列出所有的人，以及他们的定单，以及所有的定单，以及定购它们的人。
//可以使用下面的 SELECT 语句：
SELECT Persons.LastName, Persons.FirstName, Orders.OrderNo
FROM Persons
FULL JOIN Orders
ON Persons.Id_P=Orders.Id_P
ORDER BY Persons.LastName
//FULL JOIN 关键字会从左表 (Persons) 和右表 (Orders) 那里返回所有的行。
//如果 "Persons" 中的行在表 "Orders" 中没有匹配，或者如果 "Orders" 中的行在表 "Persons" 中没有匹配，这些行同样会列出

/*
结果集：
LastName	FirstName	OrderNo
Adams	    John	    22456
Adams	    John	    24562
Carter	    Thomas	    77895
Carter	    Thomas	    44678
Bush	    George
 	 	                34764
*/
<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL LIKE 操作符
//LIKE 操作符用于在 WHERE 子句中搜索列中的指定模式

//LIKE 操作符
//LIKE 操作符用于在 WHERE 子句中搜索列中的指定模式。
//SQL LIKE 操作符语法
SELECT column_name(s)
FROM table_name
WHERE column_name LIKE pattern


//LIKE 操作符实例
//例子 1
//现在，希望从上面的 "Persons" 表中选取居住在以 "N" 开始的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE 'N%'
//提示："%" 可用于定义通配符（模式中缺少的字母）


//例子 2
//接下来，希望从 "Persons" 表中选取居住在以 "g" 结尾的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE '%g'


//例子 3
//接下来，希望从 "Persons" 表中选取居住在包含 "lon" 的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City LIKE '%lon%'


//例子 4
//通过使用 NOT 关键字，可以从 "Persons" 表中选取居住在不包含 "lon" 的城市里的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE City NOT LIKE '%lon%'
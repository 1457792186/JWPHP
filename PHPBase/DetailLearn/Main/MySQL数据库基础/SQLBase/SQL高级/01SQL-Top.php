<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL TOP 子句

//TOP 子句
//TOP 子句用于规定要返回的记录的数目。
//对于拥有数千条记录的大型表来说，TOP 子句是非常有用的。
//注释：并非所有的数据库系统都支持 TOP 子句


//SQL Server 的语法：
SELECT TOP number|percent column_name(s) FROM table_name


//MySQL 和 Oracle 中的 SQL SELECT TOP 是等价的
//MySQL 语法
SELECT column_name(s)
FROM table_name
LIMIT number

//例子
SELECT *
FROM Persons
LIMIT 5



//Oracle 语法
SELECT column_name(s)
FROM table_name
WHERE ROWNUM <= number
//例子
SELECT *
FROM Persons
WHERE ROWNUM <= 5



//SQL TOP 实例
//现在，希望从上面的 "Persons" 表中选取头两条记录。
//可以使用下面的 SELECT 语句：
SELECT TOP 2 * FROM Persons



//SQL TOP PERCENT 实例
//现在，希望从上面的 "Persons" 表中选取 50% 的记录。
//可以使用下面的 SELECT 语句：
SELECT TOP 50 PERCENT * FROM Persons
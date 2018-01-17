<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL Alias（别名）
//通过使用 SQL，可以为列名称和表名称指定别名（Alias）

//SQL Alias
//表的 SQL Alias 语法
SELECT column_name(s)
FROM table_name
AS alias_name

//列的 SQL Alias 语法
SELECT column_name AS alias_name
FROM table_name


//Alias 实例: 使用表名称别名
//假设有两个表分别是："Persons" 和 "Product_Orders"。我们分别为它们指定别名 "p" 和 "po"。
//现在，希望列出 "John Adams" 的所有定单。
//可以使用下面的 SELECT 语句：
SELECT po.OrderID, p.LastName, p.FirstName
FROM Persons AS p, Product_Orders AS po
WHERE p.LastName='Adams' AND p.FirstName='John'

//不使用别名的 SELECT 语句：
SELECT Product_Orders.OrderID, Persons.LastName, Persons.FirstName
FROM Persons, Product_Orders
WHERE Persons.LastName='Adams' AND Persons.FirstName='John'


//Alias 实例: 使用一个列名别名
//SQL:
SELECT LastName AS Family, FirstName AS Name
FROM Persons
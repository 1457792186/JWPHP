<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL VIEW（视图）

//视图是可视化的表。
//讲解如何创建、更新和删除视图

//SQL CREATE VIEW 语句
//什么是视图？
//在 SQL 中，视图是基于 SQL 语句的结果集的可视化的表。
//视图包含行和列，就像一个真实的表。视图中的字段就是来自一个或多个数据库中的真实的表中的字段。
//  可以向视图添加 SQL 函数、WHERE 以及 JOIN 语句，也可以提交数据，就像这些来自于某个单一的表。
//注释：数据库的设计和结构不会受到视图中的函数、where 或 join 语句的影响。


//SQL CREATE VIEW 语法
CREATE VIEW view_name AS
SELECT column_name(s)
FROM table_name
WHERE condition
//注释：视图总是显示最近的数据。每当用户查询视图时，数据库引擎通过使用 SQL 语句来重建数据

//SQL CREATE VIEW 实例
//可以从某个查询内部、某个存储过程内部，或者从另一个视图内部来使用视图。通过向视图添加函数、join 等等，可以向用户精确地提交希望提交的数据。
//样本数据库 Northwind 拥有一些被默认安装的视图。视图 "Current Product List" 会从 Products 表列出所有正在使用的产品。这个视图使用下列 SQL 创建：
CREATE VIEW [Current Product List] AS
SELECT ProductID,ProductName
FROM Products
WHERE Discontinued=No
//可以查询上面这个视图：
SELECT * FROM [Current Product List]

//Northwind 样本数据库的另一个视图会选取 Products 表中所有单位价格高于平均单位价格的产品：
CREATE VIEW [Products Above Average Price] AS
SELECT ProductName,UnitPrice
FROM Products
WHERE UnitPrice>(SELECT AVG(UnitPrice) FROM Products)
//可以像这样查询上面这个视图：
SELECT * FROM [Products Above Average Price]


//另一个来自 Northwind 数据库的视图实例会计算在 1997 年每个种类的销售总数。请注意，这个视图会从另一个名为 "Product Sales for 1997" 的视图那里选取数据：
CREATE VIEW [Category Sales For 1997] AS
SELECT DISTINCT CategoryName,Sum(ProductSales) AS CategorySales
FROM [Product Sales for 1997]
GROUP BY CategoryName

//可以像这样查询上面这个视图：
SELECT * FROM [Category Sales For 1997]
//也可以向查询添加条件。现在，仅仅需要查看 "Beverages" 类的全部销量：
SELECT * FROM [Category Sales For 1997]
WHERE CategoryName='Beverages'


//SQL 更新视图
//可以使用下面的语法来更新视图：
SQL CREATE OR REPLACE VIEW Syntax
CREATE OR REPLACE VIEW view_name AS
SELECT column_name(s)
FROM table_name
WHERE condition

//现在，希望向 "Current Product List" 视图添加 "Category" 列。将通过下列 SQL 更新视图：
CREATE VIEW [Current Product List] AS
SELECT ProductID,ProductName,Category
FROM Products
WHERE Discontinued=No


//SQL 撤销视图
//可以通过 DROP VIEW 命令来删除视图。
SQL DROP VIEW Syntax
DROP VIEW view_name

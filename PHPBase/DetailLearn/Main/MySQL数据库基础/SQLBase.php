<?php

//SQL 对大小写不敏感

/*
SQL DML 和 DDL
可以把 SQL 分为两个部分：数据操作语言 (DML) 和 数据定义语言 (DDL)。

SQL (结构化查询语言)是用于执行查询的语法。但是 SQL 语言也包含用于更新、插入和删除记录的语法。
查询和更新指令构成了 SQL 的 DML 部分：
SELECT - 从数据库表中获取数据
UPDATE - 更新数据库表中的数据
DELETE - 从数据库表中删除数据
INSERT INTO - 向数据库表中插入数据

SQL 的数据定义语言 (DDL) 部分使我们有能力创建或删除表格。我们也可以定义索引（键），规定表之间的链接，以及施加表间的约束。
SQL 中最重要的 DDL 语句:
CREATE DATABASE - 创建新数据库
ALTER DATABASE - 修改数据库
CREATE TABLE - 创建新表
ALTER TABLE - 变更（改变）数据库表
DROP TABLE - 删除表
CREATE INDEX - 创建索引（搜索键）
DROP INDEX - 删除索引
*/





————————————————————————————————————————————————————
1.SQL SELECT 语法
//SELECT 列名称 FROM 表名称
//以及：
SELECT * FROM 表名称

//SQL SELECT 实例
//如需获取名为 "LastName" 和 "FirstName" 的列的内容（从名为 "Persons" 的数据库表），请使用类似这样的 SELECT 语句：
SELECT LastName,FirstName FROM Persons


//SQL SELECT * 实例
//现在希望从 "Persons" 表中选取所有的列。
//请使用符号 * 取代列的名称，就像这样：
SELECT * FROM Persons




————————————————————————————————————————————————————
2.SQL SELECT DISTINCT 语句
//在表中，可能会包含重复值。这并不成问题，不过，有时也许希望仅仅列出不同（distinct）的值。
//关键词 DISTINCT 用于返回唯一不同的值。

//语法：
SELECT DISTINCT 列名称 FROM 表名称


//使用 DISTINCT 关键词
//如果要从 "Company" 列中选取所有的值，需要使用 SELECT 语句：
SELECT Company FROM Orders
//如需从 Company" 列中仅选取唯一不同的值，需要使用 SELECT DISTINCT 语句：
SELECT DISTINCT Company FROM Orders







————————————————————————————————————————————————————
3.SQL WHERE 子句
//WHERE 子句
//如需有条件地从表中选取数据，可将 WHERE 子句添加到 SELECT 语句。
//语法
SELECT 列名称 FROM 表名称 WHERE 列 运算符 值

/*
下面的运算符可在 WHERE 子句中使用：
操作符	描述
=	    等于
<>	    不等于
>	    大于
<	    小于
>=	    大于等于
<=	    小于等于
BETWEEN	在某个范围内
LIKE	搜索某种模式
注释：在某些版本的 SQL 中，操作符 <> 可以写为 !=
*/













































































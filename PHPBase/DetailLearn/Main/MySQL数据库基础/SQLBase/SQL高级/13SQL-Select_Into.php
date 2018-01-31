<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL SELECT INTO 语句

//SQL SELECT INTO 语句可用于创建表的备份复件。
//SELECT INTO 语句
//SELECT INTO 语句从一个表中选取数据，然后把数据插入另一个表中。
//SELECT INTO 语句常用于创建表的备份复件或者用于对记录进行存档。
//SQL SELECT INTO 语法
//可以把所有的列插入新表：
SELECT *
INTO new_table_name [IN externaldatabase]
FROM old_tablename
//或者只把希望的列插入新表：
SELECT column_name(s)
INTO new_table_name [IN externaldatabase]
FROM old_tablename


//SQL SELECT INTO 实例 - 制作备份复件
//下面的例子会制作 "Persons" 表的备份复件：
SELECT *
INTO Persons_backup
FROM Persons
//IN 子句可用于向另一个数据库中拷贝表：
SELECT *
INTO Persons IN 'Backup.mdb'
FROM Persons
//如果希望拷贝某些域，可以在 SELECT 语句后列出这些域：
SELECT LastName,FirstName
INTO Persons_backup
FROM Persons


//SQL SELECT INTO 实例 - 带有 WHERE 子句
//也可以添加 WHERE 子句。
//下面的例子通过从 "Persons" 表中提取居住在 "Beijing" 的人的信息，创建了一个带有两个列的名为 "Persons_backup" 的表：
SELECT LastName,Firstname
INTO Persons_backup
FROM Persons
WHERE City='Beijing'


//SQL SELECT INTO 实例 - 被连接的表
//从一个以上的表中选取数据也是可以做到的。
//下面的例子会创建一个名为 "Persons_Order_Backup" 的新表，其中包含了从 Persons 和 Orders 两个表中取得的信息：
SELECT Persons.LastName,Orders.OrderNo
INTO Persons_Order_Backup
FROM Persons
INNER JOIN Orders
ON Persons.Id_P=Orders.Id_P





// 分页查询
// 1、Mysql的分页查询：　

SELECT * FROM
	student
LIMIT (PageNo - 1) * PageSize,PageSize;
// 理解：(Limit n,m)  =>从第n行开始取m条记录，n从0开始算。

// 2、Oracel的分页查询：


SELECT * FROM
	(
       SELECT
           ROWNUM rn ,*
       FROM
           student
       WHERE
           Rownum <= pageNo * pageSize
   )
WHERE
   rn > (pageNo - 1) * pageSize
// 理解：假设pageNo = 1，pageSize = 10，先从student表取出行号小于等于10的记录，然后再从这些记录取出rn大于0的记录，从而达到分页目的。ROWNUM从1开始。

// 3、SQL Server分页查询：

SELECT
    TOP PageSize *
FROM
   (
       SELECT
           ROW_NUMBER () OVER (ORDER BY id ASC) RowNumber ,*
       FROM
           student
   ) A
WHERE
   A.RowNumber > (PageNo - 1) * PageSize
 // 理解：假设pageNo = 1，pageSize = 10，先按照student表的id升序排序，rownumber作为行号，然后再取出从第1行开始的10条记录

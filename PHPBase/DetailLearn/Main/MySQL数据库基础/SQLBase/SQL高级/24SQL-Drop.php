<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL 撤销索引、表以及数据库(SQL DROP语句)

//通过使用 DROP 语句，可以轻松地删除索引、表和数据库。
//SQL DROP INDEX 语句
//可以使用 DROP INDEX 命令删除表格中的索引

//用于 Microsoft SQLJet (以及 Microsoft Access) 的语法:
DROP INDEX index_name ON table_name
//用于 MS SQL Server 的语法:
DROP INDEX table_name.index_name
//用于 IBM DB2 和 Oracle 语法:
DROP INDEX index_name
//用于 MySQL 的语法:
ALTER TABLE table_name DROP INDEX index_name


//SQL DROP TABLE 语句
//DROP TABLE 语句用于删除表（表的结构、属性以及索引也会被删除）：
DROP TABLE 表名称

//SQL DROP DATABASE 语句
//DROP DATABASE 语句用于删除数据库：
DROP DATABASE 数据库名称

//SQL TRUNCATE TABLE 语句
//如果仅仅需要除去表内的数据，但并不删除表本身，那么我们该如何做呢？
//使用 TRUNCATE TABLE 命令（仅仅删除表格中的数据）：
TRUNCATE TABLE 表名称
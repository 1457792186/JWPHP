<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL INSERT INTO 语句
//INSERT INTO 语句
//INSERT INTO 语句用于向表格中插入新的行。
//语法
INSERT INTO 表名称 VALUES (值1, 值2,....)
//也可以指定所要插入数据的列：
INSERT INTO table_name (列1, 列2,...) VALUES (值1, 值2,....)


//插入新的行
/*
"Persons" 表：
LastName	FirstName	Address	        City
Carter	    Thomas	    Changan Street	Beijing
*/
//SQL 语句：
INSERT INTO Persons VALUES ('Gates', 'Bill', 'Xuanwumen 10', 'Beijing')

//在指定的列中插入数据
//SQL 语句：
INSERT INTO Persons (LastName, Address) VALUES ('Wilson', 'Champs-Elysees')
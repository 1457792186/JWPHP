<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL LCASE() 函数

//LCASE() 函数
//LCASE 函数把字段的值转换为小写。

//SQL LCASE() 语法
SELECT LCASE(column_name) FROM table_name

//SQL LCASE() 实例
/*
 "Persons" 表：
Id	LastName	FirstName	Address	        City
1	Adams	    John	    Oxford Street	London
2	Bush	    George	    Fifth Avenue	New York
3	Carter	    Thomas	    Changan Street	Beijing
*/
//现在，希望选取 "LastName" 和 "FirstName" 列的内容，然后把 "LastName" 列转换为小写。
//使用如下 SQL 语句：
SELECT LCASE(LastName) as LastName,FirstName FROM Persons
/*
结果集类似这样：
LastName	FirstName
adams	    John
bush	    George
carter	    Thomas
*/

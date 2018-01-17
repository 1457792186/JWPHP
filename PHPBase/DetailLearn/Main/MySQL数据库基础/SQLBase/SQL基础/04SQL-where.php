<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL WHERE 子句
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


//使用 WHERE 子句
//如果只希望选取居住在城市 "Beijing" 中的人，我们需要向 SELECT 语句添加 WHERE 子句：
SELECT * FROM Persons WHERE City='Beijing'



//引号的使用
//请注意，在例子中的条件值周围使用的是单引号。
//SQL 使用单引号来环绕文本值（大部分数据库系统也接受双引号）。如果是数值，请不要使用引号

//文本值：
//这是正确的：
SELECT * FROM Persons WHERE FirstName='Bush'

//这是错误的：
//SELECT * FROM Persons WHERE FirstName=Bush

//数值：
//这是正确的：
SELECT * FROM Persons WHERE Year>1965

//这是错误的：
//SELECT * FROM Persons WHERE Year>'1965'
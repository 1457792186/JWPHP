<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL DELETE 语句

//DELETE 语句
//DELETE 语句用于删除表中的行。
//语法
//DELETE FROM 表名称 WHERE 列名称 = 值


//删除某行
//"Fred Wilson" 会被删除：
DELETE FROM Person WHERE LastName = 'Wilson'


//删除所有行
//可以在不删除表的情况下删除所有的行。这意味着表的结构、属性和索引都是完整的：
DELETE FROM table_name
//或者：
DELETE * FROM table_name
<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */



SQL IN 操作符

//IN 操作符
//IN 操作符允许我们在 WHERE 子句中规定多个值

//SQL IN 语法
SELECT column_name(s)
FROM table_name
WHERE column_name IN (value1,value2,...)



//IN 操作符实例
//现在，希望从上表中选取姓氏为 Adams 和 Carter 的人：
//可以使用下面的 SELECT 语句：
SELECT * FROM Persons
WHERE LastName IN ('Adams','Carter')
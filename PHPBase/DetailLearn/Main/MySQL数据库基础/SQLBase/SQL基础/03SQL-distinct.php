<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL SELECT DISTINCT 语句
//在表中，可能会包含重复值。这并不成问题，不过，有时也许希望仅仅列出不同（distinct）的值。
//关键词 DISTINCT 用于返回唯一不同的值。

//语法：
SELECT DISTINCT 列名称 FROM 表名称


//使用 DISTINCT 关键词
//如果要从 "Company" 列中选取所有的值，需要使用 SELECT 语句：
SELECT Company FROM Orders
//如需从 Company" 列中仅选取唯一不同的值，需要使用 SELECT DISTINCT 语句：
SELECT DISTINCT Company FROM Orders

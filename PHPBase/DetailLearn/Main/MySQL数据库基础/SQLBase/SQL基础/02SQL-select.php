<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL SELECT 语法
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
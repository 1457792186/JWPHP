<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */

SQL UPDATE 语句
//Update 语句
//Update 语句用于修改表中的数据。
//语法：
//UPDATE 表名称 SET 列名称 = 新值 WHERE 列名称 = 某值


//更新某一行中的一个列
//为 lastname 是 "Wilson" 的人添加 firstname：
UPDATE Person SET FirstName = 'Fred' WHERE LastName = 'Wilson'

//更新某一行中的若干列
//会修改地址（address），并添加城市名称（city）：
UPDATE Person SET Address = 'Zhongshan 23', City = 'Nanjing'
WHERE LastName = 'Wilson'
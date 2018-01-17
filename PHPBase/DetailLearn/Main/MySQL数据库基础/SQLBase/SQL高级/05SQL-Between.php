<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2018/1/17
 * Time: 下午1:02
 */


SQL BETWEEN 操作符

//BETWEEN 操作符在 WHERE 子句中使用，作用是选取介于两个值之间的数据范围。

//BETWEEN 操作符
//操作符 BETWEEN ... AND 会选取介于两个值之间的数据范围。这些值可以是数值、文本或者日期。

//SQL BETWEEN 语法
SELECT column_name(s)
FROM table_name
WHERE column_name
BETWEEN value1 AND value2


//BETWEEN 操作符实例
//如需以字母顺序显示介于 "Adams"（包括）和 "Carter"（不包括）之间的人，请使用下面的 SQL：
SELECT * FROM Persons
WHERE LastName
BETWEEN 'Adams' AND 'Carter'

//重要事项：不同的数据库对 BETWEEN...AND 操作符的处理方式是有差异的。
//某些数据库会列出介于 "Adams" 和 "Carter" 之间的人，但不包括 "Adams" 和 "Carter" ；
//某些数据库会列出介于 "Adams" 和 "Carter" 之间并包括 "Adams" 和 "Carter" 的人；
//而另一些数据库会列出介于 "Adams" 和 "Carter" 之间的人，包括 "Adams" ，但不包括 "Carter" 。
//所以，请检查数据库是如何处理 BETWEEN....AND 操作符的


//实例 2
//如需使用上面的例子显示范围之外的人，使用 NOT 操作符：
SELECT * FROM Persons
WHERE LastName
NOT BETWEEN 'Adams' AND 'Carter'